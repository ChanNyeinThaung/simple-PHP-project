<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location: login.php");
    exit();
}
?>
<html>
    <head>
        <title>User Edit...</title>
    </head>
    <body>
         <a href="logout.php">Log Out</a>
        <?php
        if (isset($_GET['update'])) {
            if ($_GET['update'] == 'fail') {
                echo "<p>Update Failed</p>";
                $id = $_GET['id'];
            }
        } else {
            $id = $_GET['id'];
        }

        include 'config/config.php';
        $con = $GLOBALS['con'];

        $sql = "SELECT * FROM user WHERE id ='$id'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <form method="post" action="user_edit_save.php"
              enctype="multipart/form-data">

            <label for="id">User ID</label>
            <label name="id"><?php echo $row['id']; ?></label><br>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="name">Name</label>
            <input type="text" name="name" value=
                   "<?php echo $row['name']; ?>"><br>

            <label for="age">Age</label>
            <input type="text" name="age" value=
                   "<?php echo $row['age']; ?>"><br>

            <label for="password">Password</label>
            <input type="password" name="password" value=
                   "<?php echo $row['password']; ?>"><br>
            
            <label for="role">User Role</label>
            <input type="text" name="role" value=
                   "<?php echo $row['role']; ?>"><br>
            
            <img src="upload/<?php echo $row['image'] ?>">
            
            <label for="image">User Image</label>
            <input type="file" name="image" style="display: block;">

            <input type="submit" name="submit" value="Save">
        </form>
    </body>
</html>