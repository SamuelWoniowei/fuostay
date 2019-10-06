<?php
require_once('../../startsession.php');
require_once('../../db/connect.php');


$id = $_POST['user_id'];

$sql = "UPDATE listings SET approved = 2 WHERE id = '$id'";
mysqli_query($conn, $sql) or die(mysqli_error($conn));


?>
