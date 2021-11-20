<?php
$pageTitle = "Oishii - Home";

require_once('includes/header.php');

?>

<div id="login">

    <p class="p-title">Sign in</p>

    <form action="userprofile.php" method="post">
        <label for="username">Username</label>
        <input name="username" type="text" class="login-field" required>

        <label for="password">Password</label>
        <input name="password" type="password" class="login-field" required>

        <input type="submit" name="Submit" id="submit" value="Sign In"/>
    </form>

    <p class="p-textLarge">Don't have an account? <a href="usercreateaccount.php">Create One!</a></p>

</div>

<?php

require_once('includes/footer.php');

?>