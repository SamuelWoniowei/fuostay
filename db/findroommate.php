<?php
require_once('startsession.php');
require_once('connect.php');
if (isset($_POST{'submit'})) {


  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
  $uploader_id = $_SESSION['user_id'];
  $email = $_SESSION['email'];
  $fullname = $_SESSION['fullname'];

  $marital_status    = test_input($_POST['marital_status']);
  $religion          = test_input($_POST['religion']);
  $gender            = test_input($_POST['gender']);
  $age               = test_input($_POST['age']);
  $hobbies           = test_input($_POST['hobbies']);
  $likes_dislikes    = test_input($_POST['likes_dislikes']);
  $allergies         = test_input($_POST['allergies']);
  $faculty           = test_input($_POST['faculty']);
  $department        = test_input($_POST['department']);
  $level             = test_input($_POST['level']);




  // File upload configuration
      // $new_name =rand() . '.' . $extension[1];
      // $destination = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$new_name;
      $targetDir = $_SERVER['DOCUMENT_ROOT']."/fuostay/uploads/";
      $allowTypes = array('jpg','png','jpeg','gif');

      $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
      if(!empty(array_filter($_FILES['files']['name']))){
          foreach($_FILES['files']['name'] as $key=>$val){
              // File upload path
              $fileName = basename($_FILES['files']['name'][$key]);
              $targetFilePath = $targetDir . $fileName;

              // Check whether file type is valid
              $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
              if(in_array($fileType, $allowTypes)){
                  // Upload file to server
                  if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                      // Image db insert sql
                      $insertValuesSQL .= $fileName.",";
                  }else{
                      $errorUpload .= $_FILES['files']['name'][$key].', ';
                  }
              }else{
                  $errorUploadType .= $_FILES['files']['name'][$key].', ';
              }
          }
        }

// echo $insertValuesSQL;
//record details and mark as awaiting approval

//check if a record has been made before
$sql = "SELECT * FROM listings WHERE type = 'roommate' AND  uploader_id = '$uploader_id'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($res) == 1) {
  //it exists so update the table
  $sql = "UPDATE listings SET uploader = '$fullname', type = 'roommate', marital_status = '$marital_status',
          religion = 'religion', gender ='$gender', age ='$age', hobbies = '$hobbies', likes_dislikes ='$likes_dislikes',
          allergies ='$allergies', faculty ='$faculty', department = '$department', level = '$level', pictures = '$insertValuesSQL' WHERE uploader_id = '$uploader_id' and type ='roommate'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
else {

  $sql = "INSERT INTO listings (uploader, uploader_id, type, marital_status, religion, gender, age, hobbies, likes_dislikes, allergies, faculty, department, level, pictures, approved, upload_date)
          VALUES ('$fullname', '$uploader_id', 'roommate','$marital_status', '$religion', '$gender', '$age', '$hobbies', '$likes_dislikes', '$allergies', '$faculty', '$department', '$level', '$insertValuesSQL', '0', NOW())";

  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}




header('location: ../uploadhouse.php?success');
}


?>
