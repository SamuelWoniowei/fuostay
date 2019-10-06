<?php
  require_once('../startsession.php');
  require_once('../db/connect.php');
  if (!isset($_SESSION['user_id'])){
    header('location: index.php');
  }

  if (isset($_GET['email'])) {
    $mail_to = $_GET['email'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img/icon.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="../css/custom.css?<?php echo time() ?>" />
    <link rel="stylesheet" href="css/custom.css?<?php echo time() ?>" />
    <link rel="stylesheet" href="../css/sidebar.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Lobster|Nothing+You+Could+Do&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <title>User dashboard</title>
    <script src="../js/script.js"></script>


</head>
<body>

  <div class="d-flex" id="wrapper">


    <?php require_once('components/sidebar.php'); ?>

  <div class="container support-container" style="width:65%" >
      <div class="row" style="margin-top: 6%" >
        <!-- Card -->
        <div class="card mx-xl-12" style=" width: 100%">

          <!-- Card body -->
          <div class="card-body">

            <!-- Default form subscription -->
            <form  style="padding: 0 9% 0 9%">
              <p class="h4 text-center py-4">Send an email to a user</p>

              <!-- Default input name -->
              <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Email address</label>
              <input type="text" id="defaultFormCardNameEx" value="<?php if(isset($mail_to)) echo $mail_to; ?>" class="form-control">

              <br>

              <!-- Default input email -->
              <label for="defaultFormCardEmailEx" class="grey-text font-weight-light">Subject</label>
              <input type="email" id="defaultFormCardEmailEx" class="form-control">

              <br>

              <label for="defaultFormCardMessageEx" class="grey-text font-weight-light" >Your message</label>
              <textarea name="name" id="defaultFormCardMessageEx" style="height: 200px" class="form-control"  ></textarea>

              <div class="text-center py-4 mt-3">
                <button class="btn btn-outline-orange" type="submit">Send<i
                    class="fa fa-paper-plane-o ml-2"></i></button>
              </div>
            </form>
            <!-- Default form subscription -->

          </div>
          <!-- Card body -->

        </div>
        <!-- Card -->
          </div>



      </div>
  </div>




<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});




</script>
</body>
</html>
