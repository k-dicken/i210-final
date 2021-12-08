<?php
$page_title = "Oishii - Profile";

require_once('includes/header.php');
require_once('includes/database.php');

//if user id cannot retrieved, terminate the script
if (!filter_has_var(INPUT_GET, "id")) {
    echo "Error: User ID was not found";
    require_once('includes/footer.php');
    exit();

}
//retrieve user id from a query string variable.
$user_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM users WHERE user_id=$user_id";

//execute the query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    $error = "Selection failed: ($errno) $errmsg<br/>";
    $conn->close();
    require_once('includes/footer.php');
    exit;
}

if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';
    die("user not found.");
}

?>

<div class="full">
    <p class="p-title">Your Profile</p>

    <div id="profile-content">
        <div class="profile-image"></div>
        <div>
            <p>@</p>
            <p><?= $name ?></p>
            <a href='logout.php'>Log out</a>
        </div>
        <div class="accInfo">
            <form action="register.php" method="post">
                <div class="name-wrapper">
                    <div class="input-wrapper">
                        <label for="first_name">First Name</label>
                        <div class="profile-display"><?= $first_name ?></div>
<!--                        <input class="login-field" name="first_name" type="text" required>-->
                    </div>
                    <div class="input-wrapper">
                        <label for="last_name">Last Name</label>
                        <input class="login-field" name="last_name" type="text" required>
                    </div>
                </div>
                <div class="input-wrapper">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="login-field" required>
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type='password' name='password' class="login-field" required>
                </div>
                <div class="input-wrapper">
                    <label for="user_email">Email</label>
                    <input class="login-field" name="user_email" type="email" required>
                </div>
                <div class="input-wrapper">
                    <label for="address">Address</label>
                    <input class="login-field" name="address" type="text" required>
                </div>

                <input id="submit" type="submit" onclick="window.location.href ='register.php'" value="Sign Up"/>
            </form>
        </div>
    </div>

</div>

<?php

require_once('includes/footer.php');

?>
