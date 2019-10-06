<?php
require_once('startsession.php');
require_once('connect.php');


$id = $_POST['user_id'];
$oldpass = $_POST['oldpass'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];


//see if the old pass is correct

$sql = "SELECT * FROM users WHERE id = '$id' AND password = '$oldpass'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($res) == 1) {
  $sql = "UPDATE users SET password = '$pass1' WHERE id = '$id'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  echo "Your password has been changed successfully";
}
else {
  echo "Old password is incorrect";
}


?>
