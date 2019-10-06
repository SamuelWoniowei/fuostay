<?php
    require_once('startsession.php');
    require_once('connect.php');
    $login = test_input($_POST['phone']);
    $password = test_input($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$login' OR phone = '$login' AND password = '$password' AND banned = 0";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        //create session variables to maintain dashboard access
        $_SESSION['user_id']   = $row['id'];
        $_SESSION['fullname']  = $row['fullname'];
        $_SESSION['email']     = $row['email'];
        $_SESSION['phone']     = $row['phone'];

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
