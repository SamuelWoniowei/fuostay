<?php
    require_once('connect.php');
    $email = test_input($_POST['email']);
    $fullname = test_input($_POST['fullname']);
    $phone = test_input($_POST['phone']);
    $password = test_input($_POST['password']);
    $password2 = test_input($_POST['password2']);

    //check if email already exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        echo "A user with this email already exists";
    }
    else {
      $sql = "INSERT INTO users (email, fullname, password, phone, signup_date) values ('$email', '$fullname', '$password', '$phone', NOW())";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo "You have successfully registered on fuostay";
    }






    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
