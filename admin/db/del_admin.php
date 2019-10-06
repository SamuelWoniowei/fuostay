<?php
require_once('../../startsession.php');
require_once('../../db/connect.php');


$id = $_POST['id'];


$sql = "DELETE FROM admin WHERE id ='$id'";
mysqli_query($conn, $sql) or die(mysqli_error($conn));
echo "You have successfully removed an admin";

?>
