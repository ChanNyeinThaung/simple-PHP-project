<?php

$id = $_POST['uname'];
$name = $_POST['name'];
$age = $_POST['age'];
$pword = $_POST['password'];

$image = $_FILES['image']['name'];
$ext = pathinfo($image, PATHINFO_EXTENSION);
$newfilename = $id . "." . $ext;

include 'config/config.php';
$conn = $GLOBALS['con'];

$sql = "INSERT INTO user (id, name, age, password,role, image)
VALUES ('$id', '$name', '$age','$pword', '$role', '$newfilename')";

if ($conn->query($sql) === TRUE) {
    if ($image) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".
                $newfilename);
    }
    header("location: login.php");
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    header("location: register.php?register=fail");
}

$conn->close();
?>