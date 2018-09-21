<?php

include 'config/config.php';
$con = $GLOBALS['con'];

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$password = $_POST['password'];
$role=$_POST['role'];

$image = $_FILES['image']['name'];
$ext = pathinfo($image, PATHINFO_EXTENSION);
$newfilename = $id . "." . $ext;

$sql = "UPDATE user SET name='$name', age=$age, "
        . "password='$password', role='$role',"
        . "image='$newfilename' WHERE id=$id";

if (mysqli_query($con, $sql)) {
    if ($image) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".
                $newfilename);
    }
    header("location: user_list.php");
} else {
    header("location: user_edit.php?update=fail&id=$id");
}
$con->close();
?>

