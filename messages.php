<?php
require_once('startsession.php');
if (!isset($_SESSION['user_id'])) {
  header('location: index.php');
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

      <?php require_once('components/dash-nav.php'); ?>

      <div class="container dashboard-container" style="margin-top: 4%">
        <div class="row new-dashboard-row">
          <div class="col-md-12">
            <div class="card text-left">

                <div class="card-body">
                  Hello Samuel, your recent upload has been approved and you can <a href="#">click here to view it</a>
                  <p class="text-right">Admin</p>
                  <p class="text-right"><a href="#" >Delete message</a></p>
              </div>
            </div>


            <div class="card text-left">
                <div class="card-body">
                  Congratulations Samuel on posting your first roommate ad. We are cetain you would find a roommate or roommates soon!
                    <p class="text-right">Admin</p>
                    <p class="text-right"><a href="#" >Delete message</a></p>
              </div>
            </div>

          </div>


        </div>

        </div>

    </div>
    <!-- /#page-content-wrapper -->

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
