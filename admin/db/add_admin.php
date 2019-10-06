<?php
require_once('../../startsession.php');
require_once('../../db/connect.php');


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
mysqli_query($conn, $sql) or die(mysqli_error($conn));
echo "You have successfully added an admin";

?>
