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

      <!-- Grid column -->
      <!-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">


        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">MDBootstrap</a>
        </p>
        <p>
          <a href="#!">MDWordPress</a>
        </p>
        <p>
          <a href="#!">BrandFlow</a>
        </p>
        <p>
          <a href="#!">Bootstrap Angular</a>
        </p>

      </div> -->
      <!-- Grid column -->

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
    $(document).ready(function(){
    $(window).bind('scroll', function() {
    var navHeight;
    if ($(window).width() < 500) {
      navHeight = $( window ).height() - 350;
    }
    else {
      navHeight = $( window ).height() - 70;
    }
          if ($(window).scrollTop() > navHeight) {
              $('nav').addClass('fixed');
              $('.top-three-houses').addClass('animated heartBeat');
              $('.card').addClass('animated slideInUp');
          }
          else {
              $('nav').removeClass('fixed');
              $('.top-three-houses').removeClass('animated heartBeat');
              $('.card').removeClass('animated slideInUp');
          }
     });
 });


 /* Open the sidenav */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
  let submitForm = (e) => {
    e.preventDefault();

    let username = document.querySelector('#username').value;
    let password = document.querySelector("#password").value;

    let http = new XMLHttpRequest();
    let url = 'db/login.php';
    let params = `username=${username}&password=${password}`;
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
        alert(http.responseText);
      }

    }
    http.send(params);
  }

  let newUser = (e) => {
    e.preventDefault();

    let email = document.querySelector('#email').value;
    let username = document.querySelector('#username').value;
    let password = document.querySelector("#password").value;
    let password2 = document.querySelector("#password2").value;
    let phone = document.querySelector("#phone").value;

    let http = new XMLHttpRequest();
    let url = 'db/signup.php';
    let params = `email=${email}&username=${username}&password=${password}&password2=${password2}&phone=${phone}`;
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
        alert(http.responseText);
      }

    }
    http.send(params);
  }

  document.querySelector("#signup").addEventListener("click", newUser, false);
  document.querySelector('#login').addEventListener("click", submitForm, false);






</script>




</body>
</html>
