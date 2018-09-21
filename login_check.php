
<?php
session_start();
$id = $_POST['name'];
$pword = $_POST['pword'];

include 'config/config.php';
$con=$GLOBALS['con'];

$sql = "SELECT * FROM user WHERE id ='$id'";
$result = $con->query($sql);

$row = $result->fetch_assoc();

if (isset($row['id'])) {
    if ($pword == $row['password']) {
        header("location: user_list.php");
        $_SESSION['auth']=$row['role'];
    } else {
        header("location: login.php?login=fail");
    }
} else {
    header("location: login.php?login=fail");
}
?>

