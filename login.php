<?php
if (isset($_GET['login'])) {
    if ($_GET['login'] == 'fail') {
        echo "<p>Log In Failed</p>";
    }
}
?>
<html>
    <head>
        <title>Log In...</title>
    </head>
    <body>
        <ul>
            <li>
                <b><a href="">Home</a></b>
            </li>
            <li>
                <b><a href="register.php">Create Account</a></b>
            </li>
            <li>
                <b><a href="">About</a></b>
            </li>
        </ul>
        <form method="post" action="login_check.php">

            <label for="name">User Name</label>
            <input type="text" name="name" style="display:block;">

            <label for="pword">Password</label>
            <input type="password" name="pword" style="display:block;">

            <input type="submit" name="submit" value="Send">
        </form>
    </body>
</html>