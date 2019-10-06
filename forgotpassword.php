<?php
    $pageTitle = "Fuostay - Sign up";
    require_once('components/header.php');
?>
<style>
  body {
    background-image: linear-gradient(to right , white 30%, rgba(255, 87, 34, 1) 70%);
  }
</style>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark"  >
  <a class="navbar-brand" href="index.php">Fuostay</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="houses.php">
          Find house
          <!-- <span class="sr-only">(current)</span> -->
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="roommates.php">
          Find roommate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">
          Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          Log in</a>
      </li>


    </ul>
  </div>
</nav>

<div class="container signing-form" >
    <div class="row signup-form-container" style="margin-top: 0; margin-bottom: 0;">
      <div class="col-md-4 desc-row">

        <br>
        <br>
        <!-- <h2>Create Account</h2> -->
        <!-- <p>Signup quickly and get access to posting ads on Fuostay for free </p> -->



      </div>
      <div class="col-md-8 fom-row">
        <img src="img/logs.png" alt="logo">
        <br><br>
          <h4>Recover your password</h4>
          <br><br>




          <!-- Default form register -->
          <!-- Default form login -->
  <form class="text-center " action="#!">

      <!-- <p class="h4 mb-4">Sign in</p> -->

      <!-- Email -->
      <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">



      <!-- Sign in button -->
      <button class="btn btn-info btn-block my-4" type="submit">Recover</button>




  </form>
  <!-- Default form login -->
        <!-- Default form register -->
      </div>

    </div>
</div>
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark ">

  <div style="background-color: rgba(255, 87, 34, 1);">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Get connected with us on social networks!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Fuostay</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>The first online web solution to finding accommodation and Roommates
          off-campus in Otuoke for students of Federal university Otuoke.</p>

      </div>

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="houses.php">Find houses</a>
        </p>
        <p>
          <a href="roommates.php">Find roommates</a>
        </p>
        <p>
          <a href="contact.php">Contact Us</a>
        </p>
        <p>
          <a href="#!">FAQ</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <!-- <i class="fas fa-home mr-3"></i> </p> -->
        <p>
          <i class="fas fa-envelope mr-3"></i> support@fuostay.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> +2348065255049</p>
        <p>
          <!-- <i class="fas fa-print mr-3"></i> + 01 234 567 89</p> -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="#"> Fuostay.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->






</body>
</html>
