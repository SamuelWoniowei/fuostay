<?php
  require_once('../startsession.php');
  require_once('../db/connect.php');
  if (!isset($_SESSION['user_id'])){
    header('location: index.php');
  }

  //count all users
  $sql = "SELECT COUNT(id) as total_users FROM users";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_array($res);
    $total_users = $row['total_users'];
  }
  $total_houses = 0;
  $total_roommates = 0;
  //count total houses
  $sql = "SELECT COUNT(id) as total_houses FROM listings WHERE type ='house'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_array($res);
    $total_houses = $row['total_houses'];
  }
  //count total roommate search
  $sql = "SELECT COUNT(id) as total_roommates FROM listings WHERE type ='roommate'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_array($res);
    $total_roommates = $row['total_roommates'];
  }

  //calculate $total_listings
  $total_listings = $total_houses + $total_roommates;


  //count approved house ads
  $approved_houses = 0;
  $approved_roommates = 0;
  $sql = "SELECT COUNT(id) as approved_houses FROM listings WHERE type = 'house' AND approved = 1";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_array($res);
    $approved_houses = $row['approved_houses'];
  }

  //count approved Roommates
  $sql = "SELECT COUNT(id) as approved_roommates FROM listings WHERE type ='roommate' AND approved = 1";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_array($res);
    $approved_roommates = $row['approved_roommates'];
  }

  //calculate total approved Listings
  $total_approved_listings = $approved_houses + $approved_roommates;



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
    <title>Admin dashboard</title>
    <script src="../js/script.js"></script>


</head>
<body>

  <div class="d-flex" id="wrapper">


    <?php require_once('components/sidebar.php'); ?>



      <div class="container" style="margin-top: 4%;">
        <div class="row new-dashboard-row">
          <div class="col-md-4">
            <div class="card">
              <!-- <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap"> -->

              <div class="card-body">
                <h4 class="card-title"><?php echo $total_users ?></h4>
                <p class="card-text">Total users</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
              </div>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <!-- <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap"> -->

              <div class="card-body">
                <h4 class="card-title"><?php echo $total_listings ?></h4>
                <p class="card-text">Listings uploaded</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
              </div>

            </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <!-- <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap"> -->

            <div class="card-body">
              <h4 class="card-title"><?php echo $total_approved_listings ?></h4>
              <p class="card-text">Listings Approved</p>
              <!-- <a href="#" class="btn btn-primary">Button</a> -->
            </div>

          </div>

        </div>

        </div>


        <div class="row">
          <div class="col-md-5 quick-access">
            <div class="card">
              <h4 class="card-title">Quick links</h4>
              <div class="card-body">
                <p class="card-text">
                  <ul>
                    <li><a href="#">View recent ad listings</a></li>
                    <li><a href="#">View all users</a></li>
                    <li><a href="#">Send emails</a></li>
                  </ul>
                </p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
              </div>

            </div>
          </div>

          <div class="col-md-7 notifications">
            <div class="card">
              <h4 class="card-title">Recent listings awaiting approval</h4>
              <div class="card-body">
                <p class="card-text ">
                  <ul >

                    <li>1. Samuel woniowei uploaded house listing </li>
                    <li>2. Biobele George uploaded a roommate listing</li>
                    <li></li>
                    <li></li>
                  </ul>
                </p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
              </div>
              <div class="class-footer">
                <button type="button" class="btn btn-primary btn-sm m-0">View all listings</button>
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
