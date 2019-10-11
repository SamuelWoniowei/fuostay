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
    <div class="col-md-7">
        <?php
          if (isset($_GET['view'])) {
            $id = $_GET['view'];
          }
          $sql = "SELECT * FROM listings WHERE id = '$id'";
          $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          if (mysqli_num_rows($res) == 1){
            $row = mysqli_fetch_array($res);
            $pictures = explode(',', $row['pictures']);
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
            }
            for ($x =0; $x < count($pictures); $x++) {
              if ($pictures[$x] == ""){
                unset($pictures[$x]);

              }
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

      <?php }
      ?>
    </div>
    <div class="col-md-5">
      <div class="card text-left">
        <div class="card-header">
          <span class="card-title">House details</span>
        </div>

        <div class="card-body">

          <div class="row">
            <div class="col-md-6">
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
                  <td>N<?php echo $row['price']; ?></td>
                </tr>


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

              </table>
            </div>
            <div class="col-md-6">
              <table class="table">
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

              <a href="uploadhouse.php?edit=<?php echo $row['id']?>" class="btn btn-green btn-sm m-0">Call agent</a>
            </div>
          </div>


        </div>


  </div>
    </div>

  </div>


</div>



<?php require_once('components/footer.php'); ?>
