<?php
session_start();
if (isset($_SESSION['user_id'])) {
// Delete the session vars by clearing the $_SESSION array
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 3600);
}
// Destroy the session
  session_destroy();
}
// Redirect to the home page
header('Location: index.php');
// Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
setcookie('user_id', '', time() - 3600);
setcookie('username', '', time() - 3600);
 ?>
