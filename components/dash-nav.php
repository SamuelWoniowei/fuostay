
<!-- Sidebar -->
<div class=" border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">Fuostay </div>
  <div class="list-group list-group-flush">
    <a href="userhome.php" class="list-group-item list-group-item-action ">Dashboard</a>
    <a href="uploadhouse.php" class="list-group-item list-group-item-action ">Post house</a>
    <a href="findroommate.php" class="list-group-item list-group-item-action ">Find roommate</a>
    <a href="listings.php" class="list-group-item list-group-item-action ">View listings</a>
    <a href="profile.php" class="list-group-item list-group-item-action ">Profile</a>
    <a href="logout.php" class="list-group-item list-group-item-action ">Logout</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
<nav class="navbar navbar-expand-lg  border-bottom">
  <span id="menu-toggle"><i class="fas fa-bars"></i></span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span>Fuostay</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <span class="nav-link">Welcome <?php
              $fullname = $_SESSION['fullname'];
              $full = explode(" ", $fullname);
              $full = $full[0];
        echo  $full ?> </span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="messages.php">Messages <span style=" display: inline-block; background: black; width: 27px; border-radius: 50%;">2</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>


    </ul>
  </div>
</nav>
