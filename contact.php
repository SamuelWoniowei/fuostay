<?php
    $pageTitle = "Fuostay - Support";
    require_once('components/header.php');
?>
<style>body {background-color: rgb(28, 35, 49); }</style>
<nav class="mb-1 navbar navbar-expand-lg navbar-dark">
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
        <a class="nav-link" href="roommates.php">
          Log in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="roommates.php">
          Sign up</a>
      </li>

    </ul>
  </div>
</nav>

<div class="container support-container" >
    <div class="row" style="margin-top: 6%" >
      <!-- Card -->
      <div class="card mx-xl-12" style=" width: 100%">

        <!-- Card body -->
        <div class="card-body">

          <!-- Default form subscription -->
          <form >
            <p class="h4 text-center py-4">Contact us</p>

            <!-- Default input name -->
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Your name</label>
            <input type="text" id="defaultFormCardNameEx" class="form-control">

            <br>

            <!-- Default input email -->
            <label for="defaultFormCardEmailEx" class="grey-text font-weight-light">Your email</label>
            <input type="email" id="defaultFormCardEmailEx" class="form-control">

            <br>

            <label for="defaultFormCardMessageEx" class="grey-text font-weight-light">Your message</label>
            <textarea name="name" id="defaultFormCardMessageEx" class="form-control"  ></textarea>

            <div class="text-center py-4 mt-3">
              <button class="btn btn-outline-orange" type="submit">Send<i
                  class="fa fa-paper-plane-o ml-2"></i></button>
            </div>
          </form>
          <!-- Default form subscription -->

        </div>
        <!-- Card body -->

      </div>
      <!-- Card -->
        </div>



    </div>
</div>

<?php require_once('components/footer.php'); ?>
