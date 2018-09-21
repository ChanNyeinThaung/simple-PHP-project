<?php
if (isset($_GET['register'])) {
    if ($_GET['register'] == 'fail') {
        echo "<p>Register Failed</p>";
    }
}
?>
<html>
    <head>
        <title>Register...</title>
    </head>
    <body>
        <form method="post" action="register_save.php"
              enctype="multipart/form-data">

            <label for="uname">User Name</label>
            <input type="text" name="uname" style="display:block;">

            <label for="name">Name</label>
            <input type="text" name="name" style="display:block;">

            <label for="age">Age</label>
            <input type="text" name="age" style="display:block;">

            <label for="password">Password</label>
            <input type="password" name="password" style="display:block;">

            <label for="role">User Role</label>
            <input type="text" name="role" style="display:block;">

            <label for="image">User Image</label>
            <input type="file" name="image" style="display: block;">

            <input type="submit" name="submit" value="Register">
        </form>
    </body>
</html>