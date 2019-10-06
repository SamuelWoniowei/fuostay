
<?php
require_once('startsession.php');
require_once('db/connect.php');
if (!isset($_SESSION['user_id'])) {
  header('location: index.php');
}
$id = $_SESSION['user_id'];

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

    <p class="h4 mb-4">change password</p>


            <!-- Full name -->
            <input type="text" id="oldpassword" class="form-control" value="" placeholder="Enter current password">
            <br>
            <!-- Phone number -->
            <input type="text" id="password1" class="form-control" value="" placeholder="Enter new password">
              <br>

    <!-- E-mail -->
    <input type="text" id="password2" class="form-control mb-4" value="" placeholder="Retype new password">
    <input type="hidden" id="user_id" value="<?php echo $id; ?>">



    <div class="row">
      <div class="col">
        <button class="btn btn-info btn-green my-4 btn-block" id="update_password" type="submit">Update details</button>
      </div>
      <div class="col">
        <!-- <a class="btn btn-info my-4 btn-orange btn-block" href="changepassword.php" >Change password</a> -->
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
  let oldpassword = document.querySelector('#oldpassword').value;
  let password1 = document.querySelector('#password1').value;
  let password2 = document.querySelector('#password2').value;

console.log(id);
    if (password1 != password2) {
      alert('Both passwords do not match');
    }
    else {
      let http = new XMLHttpRequest();
      let url = 'db/change_password.php';
      let params = `user_id=${id}&oldpass=${oldpassword}&pass1=${password1}&pass2=${password2}`;
      http.open('POST', url, true);

      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
          alert(http.responseText);

          window.location.reload();
        }

      }
      http.send(params);
    }


}
document.querySelector('#update_password').addEventListener('click', update, false);
</script>

</body>
</html>
