
<?php
require_once('startsession.php');
require_once('db/connect.php');
if (!isset($_SESSION['user_id'])) {
  header('location: index.php');
}

  $id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_array($res);
    $fullname = $row['fullname'];
    $email = $row['email'];
    $phone = $row['phone'];
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.png" />
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="./css/custom.css?<?php echo time() ?>" />
    <link rel="stylesheet" href="./css/sidebar.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Lobster|Nothing+You+Could+Do&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>User dashboard</title>
    <script src="../js/script.js"></script>



</head>
<body>


  <div class="d-flex" id="wrapper">

      <?php require_once('components/dash-nav.php');?>

      <div class="container" style="margin-top: 3%;">

     <!-- Default form register -->
<form class="text-center border border-light p-5" >

    <p class="h4 mb-4">Your profile</p>


            <!-- Full name -->
            <input type="text" id="fullname" class="form-control" value="<?php echo $fullname; ?>" placeholder="Fullname">
            <br>
            <!-- Phone number -->
            <input type="text" id="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Phone number">
              <br>

    <!-- E-mail -->
    <input type="email" id="email" class="form-control mb-4" value="<?php echo $email; ?>" placeholder="Email">

    <input type="hidden" name="" id="user_id" value="<?php echo $id; ?>">




    <div class="row">
      <div class="col">
        <button class="btn btn-info btn-green my-4 btn-block" id="update_details" type="submit">Update details</button>
      </div>
      <div class="col">
        <a class="btn btn-info my-4 btn-orange btn-block" href="changepassword.php" >Change password</a>
      </div>
    </div>

    <!-- Sign up button -->



</form>
<!-- Default form register -->
      </div>

<script>
let update = (e) => {
  e.preventDefault();
  let id = document.querySelector('#user_id').value;
  let fullname = document.querySelector('#fullname').value;
  let email = document.querySelector('#email').value;
  let phone = document.querySelector('#phone').value;



          let http = new XMLHttpRequest();
          let url = 'db/update_profile.php';
          let params = `user_id=${id}&fullname=${fullname}&email=${email}&phone=${phone}`;
          http.open('POST', url, true);

          http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          http.onreadystatechange = function() {
            if (http.readyState == 4 && http.status == 200) {
              alert('Your profile has been updated succesfully');

              window.location.reload();
            }

          }
          http.send(params);
}
document.querySelector('#update_details').addEventListener('click', update, false);
</script>


</body>
</html>
