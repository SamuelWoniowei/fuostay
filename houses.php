<?php
require_once('startsession.php');
require_once('db/connect.php');
    $pageTitle = "Fuostay - Homepage";
    require_once('components/header.php');
    require_once('components/navbar.php');
?>


<div class="bg-text animated fadeInUpBig">
  <h1>Welcome to FUOSTAY.com!</h1>

  <p style="font-size: 22px" class="animated fadeInLeft">Scroll down to view available houses on campus or use or quick search feature</p>

<style>
    .input-group-prepend, select
    {
        height: 60px !important;
    }

</style>


  <div class="row">
      <!-- <div class="col-sm-3">bad boy</div> -->
      <div class="col-sm-12">
      <form>
          <div class="row">
            <div class="col-sm-5">

            <div class="input-group">
                <!-- <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Preferred house type</label>
                    </div> -->
                    <select class="custom-select">
                        <option selected>Select your preferred house type</option>
                        <option value="1">Single room</option>
                        <option value="2">Self Contain </option>
                        <option value="3">One bedroom flat</option>
                        <option value="3">Two bedroom flat</option>
                        <option value="3">Three bedroom flat</option>
                     </select>
                </div>

            </div>
            <div class="col-sm-5">
            <div class="input-group">
                <!-- <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Preferred house type</label>
                    </div> -->
                    <select class="custom-select">
                        <option selected>Select your preferred location</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                </div>
            </div>

            <div class="col-sm-2">
            <button class="btn btn-md btn-info m-0 px-3" type="button">Check availability</button>
            </div>
          </div>

      </form>

      </div>
  </div>
</div>



<div class="container ads-container">
    <div class="row" style="margin-top: 3%">
      <?php
      //display last added houses
        $sql = "SELECT * FROM listings WHERE type = 'house' and approved = 1";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while($row = mysqli_fetch_array($res)){
          switch($row['house_type']) {
            case 'self_contain':
              $house_type = 'self contain';
              break;
            case 'one_bedroom':
                $house_type = 'One bedroom flat';
                break;
            case 'two_bedroom':
                  $house_type = 'Two bedroom flat';
                  break;
          }

          $pictures = explode(",", $row['pictures']);
          $house_id = $row['id'];
      ?>
        <div class="col-md-4">
            <div class="card ">

                <img class="card-img-top home-card-image" src="uploads/<?php echo $pictures[0]; ?>" alt="house">



                    <div class="card-body">
                        <h4 class="card-title"><?php echo $house_type ?></h4>
                        <p class="card-text">
                            <?php echo $row['location']; ?>
                        </p>
                        <a href="viewhouse.php?view=<?php echo $house_id; ?>" class="btn btn-primary home-card-button">View more</a>
                    </div>
            </div>

        </div>
      <?php } ?>
</div>
</div>


<?php require_once('components/footer.php'); ?>
