<?php
    require_once('../../startsession.php');
    require_once('../../db/connect.php');
    $login = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$login' AND password = '$password'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        //create session variables to maintain dashboard access
        $_SESSION['user_id']   = $row['id'];
        $_SESSION['email']     = $row['email'];
        $_SESSION['fullname']  = $row['fullname'];

    }
    else {
        echo "invalid";
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
