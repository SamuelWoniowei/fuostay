<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "fuostay";

    //establish connection

    $conn = mysqli_connect($servername, $username, $password, $db) or die(mysqli_error($conn));

    //check connection

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
