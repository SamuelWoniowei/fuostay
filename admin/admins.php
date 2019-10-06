<?php
  require_once('../startsession.php');
  require_once('../db/connect.php');
  if (!isset($_SESSION['user_id'])){
    header('location: index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img/icon.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="../css/custom.css?<?php echo time() ?>" />
    <link rel="stylesheet" href="css/custom.css?<?php echo time() ?>" />
    <link rel="stylesheet" href="../css/sidebar.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Lobster|Nothing+You+Could+Do&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Admin dashboard</title>
    <script src="../js/script.js"></script>


</head>
<body>

  <div class="d-flex" id="wrapper">


    <?php require_once('components/sidebar.php'); ?>



      <div class="container" style="margin-top: 4%;">
        <div class="row new-dashboard-row">

          <div class="col-md-6">
            <!-- <div class="card text-left"> -->
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
 <thead>
   <tr>
     <th class="th-sm">S/N </th>
     <th class="th-sm">Username </th>
     <th class="th-sm">Action</th>

     </th>
   </tr>
 </thead>
 <tbody>

   <?php
   $sql = "SELECT *  FROM admin";
   $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   $count = 1;

   while ($row = mysqli_fetch_array($res)) {
     $id = $row['id'];
     if ($row['username'] == 'sam'){}
       else {
     echo "<tr>";
     echo "<td>$count</td>";
     echo "<td>".$row['username'] ."</td>";
     echo '<td><button type="button" onclick="del('.$id.')" class="btn btn-red btn-sm m-0">Delete</button> ';
     // echo '<a href="#" class="btn btn-yellow btn-sm m-0">email</a></td>';
     $count++;
     echo "</tr>";
   }
 }


   ?>

</tbody>

</table>
<button type="button" onclick="show_add_form()"  class="btn btn-green btn-sm m-0">Add admin</button>
<!-- <button type="button" onclick="show_remove_form()"  class="btn btn-red btn-sm m-0">Remove admin</button> -->
</div>



          </div>


        <div class="col-md-12">
          <form class="add_admin_form " style="width: 70%;  margin: auto;">

              <p class="h4 mb-4">Add admin  </p>
              <small id="login_error" class="form-text text-muted mb-4 text-danger"></small>
              <!-- Email -->
              <input type="text" id="username" class="form-control mb-4" placeholder = "username" required>

              <!-- Password -->
              <input type="password" id="password" class="form-control mb-4" placeholder = "Password" required>

              <input type="password" id="password2" class="form-control mb-4" placeholder = "Retype password" required>


              <button class="btn btn-info btn-block my-4" id="add_admin" type="submit">add</button>
<button type="button" onclick="close_add_form()"  class="btn text-right btn-red btn-sm m-0">Close form</button>


          </form>



        </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>

</div>





<script>

$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

document.querySelector('.add_admin_form').style.display = 'none';

let show_add_form = () => {
    document.querySelector('.add_admin_form').style.display = 'block';
}

let close_add_form = () => {
  document.querySelector('.add_admin_form').style.display = 'none';
}






let add = () => {
  let username = document.querySelector('#username').value;
  let password = document.querySelector('#password').value;
  let password2 = document.querySelector('#password2').value;

  if (username == ""){
    alert("Please enter a username");
  }
  else {
  if (password == "" || password.length < 6) {
    alert("Invalid password, please enter a password at least 6 characters long");
  }
  else if (password != password2) {
    alert('both passwords do not match');
  }
  else {

          let http = new XMLHttpRequest();
          let url = 'db/add_admin.php';
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
}
}

let del = (id) => {

            let http = new XMLHttpRequest();
            let url = 'db/del_admin.php';
            let params = `id=${id}`;
            http.open('POST', url, true);

            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.onreadystatechange = function() {
              if (http.readyState == 4 && http.status == 200) {
                alert(http.responseText);
                window.location.reload();
              }

            }
            http.send(params);
}

document.querySelector('#add_admin').addEventListener('click', add, false);


</script>
</body>
</html>
