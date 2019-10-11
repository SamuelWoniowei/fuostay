<?php


require_once('startsession.php');
require_once('db/connect.php');

    $pageTitle = "Sarf Project Homepage";
    require_once('components/header.php');
    require_once('components/navbar.php');
?>



<div class="bg-text animated fadeInUpBig">
  <h1>Welcome to FUOSTAY.com!</h1>

  <p class="animated fadeInLeft">Scroll down to find available accommodation and roommates or use or quick search feature</p>

<style>
    .input-group-prepend, select
    {
        height: 60px !important;
    }

</style>


  <div class="row">

      <div class="col-sm-12">
      <form>
          <div class="row">
            <div class="col-sm-5">

            <div class="input-group">

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

                    <select class="custom-select">
                        <option selected>Select your preferred location</option>
                        <option value="1">Anywhere</option>
                        <option value="2">Olumba road</option>
                        <option value="3">Hospital road</option>
                        <option value="4">P.A road</option>
                        <option value="5">Otuaba</option>
                        <option value="6">Highness road</option>
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


    <div class="row">
        <div class="col-sm-12">
            <h2 class="top-three-houses">Newly added houses</h2>
        </div>
    </div>



    <div class="row">
      <?php
      //display last added houses
        $sql = "SELECT * FROM listings WHERE type = 'house' and approved = 1 ORDER BY id DESC LIMIT 3 ";
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
                            N<?php echo $row['price']; ?>
                        </p>
                        <a href="viewhouse.php?view=<?php echo $house_id; ?>" class="btn btn-primary home-card-button">View more</a>
                    </div>
            </div>

        </div>
      <?php } ?>


    </div>






    <div class="row" >
            <div class="col-md-12 roommate-ad-row">
                Looking for a roommate?
                <p style="font-family: 'Lato', sans-serif; font-size: 30px; margin-top: 1.5\%;">
                    Select your roommate's gender
                </p>
            </div>
    </div>
    <div class="row roommate-gender-category" >
        <div class="col-md-6 male-student-image" >
            <div class="card">
            <a href="#"><img class="card-img-top home-card-image" src="img/malestudent.jpg" alt="Male student" width = "100%"></a>
            <!-- <a href="#"><h4 class="card-title gender-card-title">MALE</h4></a> -->
            </div>

        </div>
        <div class="col-md-6 female-student-image" >
        <div class="card">
            <a href="#"><img class="card-img-top home-card-image" src="img/femalestudent.jpg" alt="Female student" width = "100%"></a>
            <!-- <a href="#"><h4 class="card-title gender-card-title">FEMALE</h4></a> -->
            </div>
        </div>
    </div>

    <div class="row" id="howItWorks">
        <div class="col-sm-12">
            <h2 class="top-three-houses" >How it works</h2>
        </div>

        <div class="col-md-4 text-center instruction-tab1">
            <i class="fab fa-pen instruction-icon instruction-icon1 "></i>
            <h4 class="instruction-title instruction-title1">
                Register
            </h4>
            <p class="instruction-text">
                Fill the sign up form correctly with your details
            </p>
        </div>
        <div class="col-md-4 text-center instruction-tab2">
            <i class="fab fa-camera instruction-icon instruction-icon2"></i>
            <h4 class="instruction-title instruction-title2">
                Upload pictures
            </h4>
            <p class="instruction-text">
                Upload pictures of your ad
            </p>
        </div>
        <div class="col-md-4 text-center instruction-tab3">
            <i class="fab fa-phone instruction-icon instruction-icon3"></i>
            <h4 class="instruction-title instruction-title3">
                Get called
            </h4>
            <p class="instruction-text">
                Wait for insterested people to call you and meet you up for your ad
            </p>
        </div>
    </div>

    <div class="row get-started-row">

        <button class="btn peach-gradient"><a class="nav-link" href="signup.php" >Get started</a></button>

    </div>
</div>




<?php require_once('components/footer.php'); ?>
