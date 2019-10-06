<?php
require_once('startsession.php');
require_once('db/connect.php');
    $pageTitle = "Sarf Project Homepage";
    require_once('components/header.php');
    require_once('components/navbar.php');
?>



<!-- <div class="bg-image"></div> -->

<div class="bg-text animated fadeInUpBig">
  <h1>Welcome to FUOSTAY.com!</h1>

  <p style="font-size: 22px" class="animated fadeInLeft">Scroll down to view available roommates on campus or use or quick search feature</p>

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
                        <option selected>Select your roommate gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female </option>
                     </select>
                </div>

            </div>
            <div class="col-sm-5">
            <div class="input-group">
                    <select class="custom-select">
                        <option selected>Select your preferred location</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                </div>
            </div>

            <div class="col-sm-2">
            <button class="btn btn-md btn-info m-0 px-3" type="button">View</button>
            </div>
          </div>

      </form>

      </div>
  </div>
</div>


<div class="container roommate-ads-container">
    <h1 class="roommate-ads-title ">
        Students searching for roommates
    </h1>
    <div class="row">
      <?php
      //display last added houses
        $sql = "SELECT * FROM listings WHERE type = 'roommate' and approved = 1";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while($row = mysqli_fetch_array($res)){
          $uploader_id = $row['uploader_id'];
          $pictures = explode(',', $row['pictures']);
          $pic = $pictures[0];
          $roommate_id = $row['id'];

          $query = "SELECT fullname FROM users WHERE id = '$uploader_id'";
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

          if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $fullname = $row['fullname'];

          }
      ?>
        <div class="col-md-4">
            <div class="card roommate-ad-card">
                <div class="row">
                    <div class="col-sm-3">
                    <img class="card-img-top home-card-image roommate-ad-details-img" src="uploads/<?php echo $pic ?>" alt="Card image cap">
                      <!-- <span style="font-size: 30%">click to view image</span> -->
                    </div>
                    <div class="col-sm-8">
                    <h4 class="card-title"><?php echo $fullname; ?></h4>
                        <p class="card-text">
                            Is searching for a roommate
                        </p>
                        <a href="viewroommate.php?view=<?php echo $roommate_id; ?>" class="btn btn-primary home-card-button roommate-ad-card-button">View more</a>
                    </div>
                </div>
                  </div>

        </div>
  <?php } ?>




        </div>

</div>
</div>
<?php require_once('components/footer.php'); ?>
