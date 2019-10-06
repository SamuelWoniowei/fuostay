<?php
require_once('startsession.php');
require_once('db/connect.php');
if (!isset($_SESSION['user_id'])) {
  header('location: index.php');
}
$uploader_id = $_SESSION['user_id'];
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

      <?php require_once('components/dash-nav.php');
      $sql = "SELECT * FROM listings WHERE uploader_id = '$uploader_id'";
      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $status = "";
        while ($row = mysqli_fetch_array($res)) {

          if ($row['approved'] == 1){
            $status = "<span class='text-success'>Approved</span>";
          }
          else if($row['approved'] == 0) {
            $status = "<span class='text-primary'>Awaiting approval</span>";
          }
          else if ($row['approved'] == 2) {
            $status = "<span class='text-danger'>Disapproved</span> <br>You can edit the details of the listing and resubmit or contact the support team to assist you. Thank you";
          }

          if ($row['type'] == 'house') {
            switch($row['house_type']) {
              case 'one_room':
                $house_type = 'One room';
                break;
              case 'self_contain':
                $house_type = 'self contain';
                break;
              case 'one_bedroom':
                  $house_type = 'One bedroom';
                  break;
              case 'two_bedroom':
                    $house_type = 'Two bedroom';
                    break;
            }
      ?>
      <div class="card text-left">
        <div class="card-header">
          <span class="card-title">House listing <br class="text-right">Appoval status: <?php echo $status; ?></span>
        </div>

        <div class="card-body">
          <span class="card-title">House details  </span>
          <div class="row">
            <div class="col-md-4">
              <table class="table">
                <tr>
                  <td>1</td>
                  <td>House type</td>
                  <td><?php echo $house_type; ?></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Max no. occupants</td>
                  <td><?php echo $row['max_occupants']; ?></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Price</td>
                  <td><?php echo $row['price']; ?></td>
                </tr>

              </table>
            </div>
            <div class="col-md-4">
              <table class="table">
                <tr>
                  <td>4</td>
                  <td>Wardrobe</td>
                  <td>
                    <?php
                    if ($row['wardrobe'] == 1){
                      echo "Available";
                    }
                    else {
                      echo "Not available";
                    }
                  ?>
                </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Fence</td>
                  <td>
                    <?php
                    if ($row['fence'] == 1){
                      echo "Available";
                    }
                    else {
                      echo "Not available";
                    }
                  ?>
                  </td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Kitchen cabinet</td>
                  <td>
                    <?php
                    if ($row['k_cabinet'] == 1){
                      echo "Available";
                    }
                    else {
                      echo "Not available";
                    }
                  ?>
                  </td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Ceiling fan</td>
                  <td>
                    <?php
                    if ($row['c_fan'] == 1){
                      echo "Available";
                    }
                    else {
                      echo "Not available";
                    }
                  ?>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <table class="table">
                <tr>
                  <td>8</td>
                  <td>Location</td>
                  <td><?php echo $row['location']; ?></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Other details</td>
                  <td><?php echo $row['more_details']; ?></td>
                </tr>

              </table>
              <p>
                <a class="btn btn-blue btn-sm m-0">View house pictures</a>
              </p>

              <a href="uploadhouse.php?edit=<?php echo $row['id']?>" class="btn btn-yellow btn-sm m-0">Edit</a>
              <button type="button"  onclick="delete_listing(<?php echo $row['id']?>)" class="btn btn-red btn-sm m-0">Delete</button>
            </div>
          </div>


          <!-- <a href="#" class="btn btn-primary">Button</a> -->
        </div>
        <div class="card-footer">
          <p class="card-text text-right">uploaded on: <a href="#"><?php echo $row['upload_date']; ?></a></p>
        </div>


  </div>
  <?php } else if ($row['type'] == 'roommate') {?>

  <div class="card text-left">
    <div class="card-header">
      <span class="card-title">You searched for a roommate <br class="text-right">Appoval status: <?php echo $status; ?></span>
    </div>

    <div class="card-body">
      <span class="card-title">Your details</span>
      <div class="row">
        <div class="col-md-4">
          <table class="table">
            <tr>
              <td>1</td>
              <td>Marital status</td>
              <td><?php echo $row['marital_status']; ?></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Religion</td>
              <td><?php echo $row['religion']; ?></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Age</td>
              <td><?php echo $row['age']; ?></td>
            </tr>

          </table>
        </div>
        <div class="col-md-4">
          <table class="table">
            <tr>
              <td>4</td>
              <td>Faculty</td>
              <td><?php echo $row['faculty']; ?></td>
            </tr>
            <tr>
              <td>5</td>
              <td>Department</td>
              <td><?php echo $row['department']; ?></td>
            </tr>
            <tr>
              <td>6</td>
              <td>Level</td>
              <td><?php echo $row['level']; ?></td>
            </tr>

          </table>
        </div>
        <div class="col-md-4">
          <table class="table">
            <tr>
              <td>6</td>
              <td>Hobbies</td>
              <td><?php echo $row['hobbies']; ?></td>
            </tr>
            <tr>
              <td>7</td>
              <td>Allergies</td>
              <td><?php echo $row['allergies']; ?></td>
            </tr>
            <tr>
              <td>6</td>
              <td>Likes and dislikes</td>
              <td><?php echo $row['likes_dislikes']; ?></td>
            </tr>

          </table>
          <p>
            <a class="btn btn-blue btn-sm m-0">View your uploaded pictures </a>
          </p>

          <a href="findroommate.php"  class="btn btn-yellow btn-sm m-0">Edit</a>
          <button type="button" onclick="delete_listing(<?php echo $row['id']?>)" class="btn btn-red btn-sm m-0">Delete</button>
        </div>
      </div>



    </div>
    <div class="card-footer">
      <p class="card-text text-right">uploaded on: <a href="#"><?php echo $row['upload_date']; ?></a></p>
    </div>


  </div>

  <?php } }?>

<script>

$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});


  let delete_listing = (id) => {

    let http = new XMLHttpRequest();
    let url = 'db/delete_listing.php';
    let params = `user_id=${id}`;
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
        alert('listing has been deleted succesfully ');
        window.location.reload();
      }

    }
    http.send(params);
  }



</script>

</body>
</html>
