<?php
require_once('startsession.php');
require_once('connect.php');


$id = $_POST['user_id'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "UPDATE users SET fullname = '$fullname', email = '$email', phone = '$phone' WHERE id = '$id'";
mysqli_query($conn, $sql) or die(mysqli_error($conn));


?>
