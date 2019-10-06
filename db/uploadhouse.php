<?php
require_once('startsession.php');
require_once('connect.php');
if (isset($_POST{'submit'})) {

    $wardrobe         = 0;
    $fence            = 0;
    $k_cabinet        = 0;
    $c_fan            = 0;
    $water            = 0;
    $power            = 0;
    $heater           = 0;


if (!empty($_POST['desc'])) {
  foreach($_POST['desc'] as $selected){
    switch ($selected) {
      case 'wardrobe' :
            $wardrobe = 1;
            break;
      case 'k_cabinet' :
            $k_cabinet = 1;
            break;
      case 'fence' :
            $fence = 1;
            break;
      case 'c_fan' :
            $c_fan = 1;
            break;
      case 'water' :
            $water = 1;
            break;
      case 'heater' :
            $heater = 1;
            break;
      case 'power' :
            $power = 1;
            break;
    }
  }
}



  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
  $email = $_SESSION['email'];
  $fullname = $_SESSION['fullname'];
  $uploader_id = $_SESSION['user_id'];
  $house_type       = test_input($_POST['house_type']);
  $max_no_occupants = test_input($_POST['max_no_occupants']);
  $price            = test_input($_POST['price']);
  $more_details     = test_input($_POST['more_details']);
  $location         = mysqli_real_escape_string($conn, trim($_POST['location']));



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

$sql = "INSERT INTO listings (uploader, uploader_id, more_details, type, house_type,  price, location, max_occupants,  fence, wardrobe, k_cabinet, c_fan, water, power, heater, pictures, approved, upload_date)
        VALUES ('$fullname', '$uploader_id', '$more_details', 'house', '$house_type', '$price','$location', '$max_no_occupants', '$fence', '$wardrobe', '$k_cabinet', '$c_fan', '$water', '$power', '$heater', '$insertValuesSQL', '0', NOW())";

$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));


header('location: ../uploadhouse.php?success');
}


?>
