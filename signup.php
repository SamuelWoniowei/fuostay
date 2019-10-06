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
          <span class="sr-only">(current)</span>
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


    </ul>
  </div>
</nav>

<div class="container signing-form" >
    <div class="row signup-form-container" style="margin-top: 0; margin-bottom: 0;">
      <div class="col-md-4 desc-row">

        <br>
        <br>
        <!-- <h2>Create Account</h2> -->
        <div class="desc-cont">
          <h1> The journey starts here</h1> <br>
          <p>
            Discover & rent the best off-campus accommodations around school easily
          </p>
        </div>




      </div>
      <div class="col-md-8 fom-row">
        <img src="img/logs.png" alt="logo">
        <br><br>

        <div id="show_signup_welcome_msg">
          <h2 class="text-success">Welcome!</h2>
            <p>You have successfully registered an account with us and we are excited! <a href="login.php">continue here</a> to log
              in to your personalized dashboard.
              </p>
        </div>
        <div id="hide_signup_form">
          <h4>Create Account</h4>

          <!-- Social register -->
          <p>sign up with:</p>

          <button class="light-blue-text  mx-2" style="border: none; background: white">
              <i class="fab fa-facebook-f signup-social-button" style="background: #3b5998"></i>
          </button>
          <button type="button" class="light-blue-text  mx-2" style="border: none; background: white">
              <i class="fab fa-twitter signup-social-button" style="background:  #1da1f2"></i>
          </button>
          <button type="button" class="light-blue-text mx-2" style="border: none; background: white">
              <i class="fab fa-google-plus signup-social-button" style="background: #db3236"></i>
          </button>

            <br><br>
          <p>Or</p>



          <!-- Default form register -->
        <form class="text-center p-5" method="post">

            <!-- Full name -->
            <input type="text" id="fullname" class="form-control mb-4 " placeholder="Full name" required>
            <small id="fullname_error" class="form-text text-muted mb-4 text-danger"></small>
            <!-- E-mail -->
            <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" required>
            <small id="email_error" class="form-text text-muted mb-4 text-danger" ></small>
            <!-- Password -->
            <input type="password" id="password" class="form-control" placeholder="Password"  required>
            <small id="password_error" class="form-text text-muted mb-4 text-danger"></small>

            <input type="password" id="password2" class="form-control" placeholder="Retype Password" required>
            <small id="password2_error" class="form-text text-muted mb-4 text-danger"></small>
            <!-- Phone number -->
            <input type="text" id="phone" class="form-control" placeholder="Phone number" required>
            <small id="phone_error" class="form-text text-muted mb-4 text-danger"></small>


            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" id="submit_form" type="submit">Continue</button>


            <p>Already a member?
                <a href="login.php">Log in</a>
            </p>

          <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Continue</em> you agree to our
                <a href="" target="_blank">terms of service</a>
              </p>

        </form>
        <!-- Default form register -->
      </div>
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


<script>
document.querySelector('#show_signup_welcome_msg').style.display = 'none';
let newUser = (e) => {
  e.preventDefault();

  // variables for input fields
  let email     = document.querySelector('#email').value;
  let fullname  = document.querySelector('#fullname').value;
  let password  = document.querySelector("#password").value;
  let password2 = document.querySelector("#password2").value;
  let phone     = document.querySelector("#phone").value;


  let validateFields = () => {
    let form_okay_to_submit = false;
    if (fullname == "" || fullname == " ") {
      document.querySelector("#fullname_error").innerHTML = "Please provide your full name";
      form_okay_to_submit = false;
    }
    else {
      document.querySelector("#fullname_error").innerHTML = "";
      form_okay_to_submit = true;
    }

    if (email == "") {
      document.querySelector("#email_error").innerHTML = "Please provide email address";
      form_okay_to_submit = false;
    }
    else {
        document.querySelector("#email_error").innerHTML = "";
        form_okay_to_submit = true;form_okay_to_submit = true;
    }

    if (password == "" || password == " ") {
      document.querySelector("#password_error").innerHTML = "Please enter a password";
      form_okay_to_submit = false;
    }
    else {
      document.querySelector("#password_error").innerHTML = "";
      form_okay_to_submit = true;
    }

    if (password2 == "" || password2 == " ") {
      document.querySelector("#password2_error").innerHTML = "Please retype your password";
      form_okay_to_submit = false;
    }
    else {
      document.querySelector("#password2_error").innerHTML = "";
      form_okay_to_submit = true;
    }

    if (password != password2) {
      document.querySelector("#password2_error").innerHTML = "Both passwords do not match";
      form_okay_to_submit = false;
    }
    else {
      document.querySelector("#password2_error").innerHTML = "";
      form_okay_to_submit = true;
    }
    let pass_regex = /^(08|09|07)(\d{9})$/;
    if (phone == "" || phone == " ") {
        document.querySelector("#phone_error").innerHTML = "Please enter a correct phone number";
    }
    else {
      if (!pass_regex.test(phone)){
        document.querySelector("#phone_error").innerHTML = "Please enter a correct phone number";
      }
      else {
        document.querySelector("#phone_error").innerHTML = "";
      }
    }

    return form_okay_to_submit;
  }

  validateFields();

  if (validateFields()) {
      let http = new XMLHttpRequest();
      let url = 'db/signup.php';
      let params = `email=${email}&fullname=${fullname}&password=${password}&password2=${password2}&phone=${phone}`;
      http.open('POST', url, true);

      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
          document.querySelector('#hide_signup_form').style.display = 'none';
          document.querySelector('#show_signup_welcome_msg').style.display = 'block';
        }

      }
      http.send(params);
  }
}

document.querySelector("#submit_form").addEventListener("click", newUser, false);

</script>




</body>
</html>
