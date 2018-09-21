<?php

session_start();
if (!isset($_SESSION['auth'])) {
    header("location: login.php");
    exit();
}

include 'config/config.php';
$con = $GLOBALS['con'];

$id = $_GET['id'];
$image = $_GET['image'];
$sql = "DELETE FROM user WHERE id = $id";

if (mysqli_query($con, $sql)) {
    if (isset($_GET['id'])) { 
        if (!unlink("upload/" . $image)) {
            echo ("Error deleting $image");
        } else {
            echo ("Deleted $image");
        }
    }
    header("location: user_list.php");
} else {
    header("location: user_list.php?delete=fail");
}

mysqli_close($con);
?>
