<?php


require_once('startsession.php');
require_once('db/connect.php');

    $pageTitle = "Sarf Project Homepage";
    require_once('components/header.php');

?>

	<nav class="mb-1 navbar navbar-expand-lg navbar-dark">
	  <a class="navbar-brand" href="index.php">Fuostay</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
	    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item ">
	        <a class="nav-link" href="houses.php">
	          Find house

	        </a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="roommates.php">
	          Find roommate</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="login.php">
	          Log in</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="signup.php">
	          Sign up</a>
	      </li>

	    </ul>
	  </div>
	</nav>
	<!--/.Navbar -->

</section>







<div class="container-fluid">
  <div class="row view-container">
    <div class="col-md-6">
        <?php
          if (isset($_GET['view'])) {
            $id = $_GET['view'];
          }
          $sql = "SELECT * FROM listings WHERE id = '$id'";
          $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          if (mysqli_num_rows($res) == 1){
            $row = mysqli_fetch_array($res);
            $pictures = explode(',', $row['pictures']);
            $uploader_id = $row['uploader_id'];
            $marital_status = $row['marital_status'];
            $religion = $row['religion'];
            $age = $row['age'];
            $faculty = $row['faculty'];
            $department = $row['department'];
            $level = $row['level'];
            $hobbies = $row['hobbies'];
            $allergies = $row['allergies'];
            $likes_dislikes = $row['likes_dislikes'];

            for ($x =0; $x < count($pictures); $x++) {
              if ($pictures[$x] == ""){
                unset($pictures[$x]);

              }
            }

            $query = "SELECT fullname FROM users WHERE id = '$uploader_id'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            if (mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_array($result);
              $fullname = $row['fullname'];

            }
        ?>


        <!--Carousel Wrapper-->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">


  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <?php
      for ($x =0; $x < count($pictures); $x++) {
        if ($x == 0) {
          echo "<div class='carousel-item active view-image'>
              <img class='d-block w-100' src='uploads/$pictures[$x]'>
          </div>";
        }
        else {
          echo "<div class='carousel-item view-image'>
              <img class='d-block w-100' src='uploads/$pictures[$x]'>
          </div>";
        }
      }

    ?>

  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
      <?php }
      ?>
    </div>
    <div class="col-md-6">
      <div class="card text-left">
        <div class="card-header">
          <span class="card-title">Roommate details</span>
        </div>

        <div class="card-body">
          <!-- <span class="card-title">House details  </span> -->
          <div class="row">
            <div class="col-md-6">
              <table class="table">
                <tr>
                  <td>1.</td>
                  <td>Fullname</td>
                  <td><?php echo $fullname; ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Marital status</td>
                  <td><?php echo $marital_status ?></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Religion</td>
                  <td><?php echo $religion?></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Age</td>
                  <td><?php echo $age ?></td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Faculty</td>
                  <td><?php echo $faculty ?></td>
                </tr>


              </table>
            </div>
            <div class="col-md-6">
              <table class="table">
                <tr>
                  <td>6.</td>
                  <td>Department</td>
                  <td><?php echo $department?> </td>
                </tr>
                <tr>
                  <td>7.</td>
                  <td>Level</td>
                  <td><?php echo $level ?></td>
                </tr>
                <tr>
                  <td>8.</td>
                  <td>Hobbies</td>
                  <td><?php echo $hobbies ?></td>
                </tr>
                <tr>
                  <td>9.</td>
                  <td>Allergies</td>
                  <td><?php echo $allergies ?></td>
                </tr>
                <tr>
                  <td>10.</td>
                  <td>Likes and dislikes</td>
                  <td><?php echo $likes_dislikes ?></td>
                </tr>

              </table>
              <!-- <p>
                <a class="btn btn-blue btn-sm m-0">View house pictures</a>
              </p> -->

              <button type="button"  class="btn btn-green btn-sm m-0">Call student</button>

            </div>
          </div>


          <!-- <a href="#" class="btn btn-primary">Button</a> -->
        </div>
        <!-- <div class="card-footer">
          <p class="card-text text-right">uploaded on: <a href="#"><?php echo $row['upload_date']; ?></a></p>
        </div> -->


  </div>
    </div>

  </div>


</div>



<?php require_once('components/footer.php'); ?>
