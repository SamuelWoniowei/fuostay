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
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <title>User dashboard</title>
    <script src="../js/script.js"></script>


</head>
<body>

  <div class="d-flex" id="wrapper">


    <?php require_once('components/sidebar.php'); ?>




      <div class="container" style="margin-top: 4%;">
        <div class="row">

          <div class="col-md-12">
            <!-- <div class="card text-left"> -->
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
 <thead>
   <tr>
     <th class="th-sm">S/N </th>
     <th class="th-sm">Name </th>
     <th class="th-sm">Email

     </th>
     <th class="th-sm">Phone number</th>


     <th class="th-sm">Signup date

     </th>

     <th class="th-sm">Action</th>
     <th class="th-sm">Account status</th>

     </th>
   </tr>
 </thead>
 <tbody>

   <?php
   $sql = "SELECT *  FROM users";
   $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   $count = 1;

   while ($row = mysqli_fetch_array($res)) {
     $id = $row['id'];

     echo "<tr>";
     echo "<td>$count</td>";
     echo "<td>".$row['fullname'] ."</td>";
     echo "<td>".$row['email'] ."</td>";
     echo "<td>".$row['phone']."</td>";
     echo "<td>".$row['signup_date']."</td>";
     echo '<td>';
     if ($row['banned'] == 1){
       $banned = "banned";
       echo '<button type="button" onclick=activate('.$id.') class="btn btn-green btn-sm m-0">Reactivate</button>';
     }
     else {
       $banned = "active";
       echo '<button type="button" onclick=ban('.$id.') class="btn btn-red btn-sm m-0">Ban</button> ';
     }
     echo '<a href="sendmail.php?email='.$row['email'].'" class="btn btn-yellow btn-sm m-0">email</a></td>';
     echo "<td>".$banned."</td>";
     $count++;
     echo "</tr>";
   }


   ?>

</tbody>

</table>
            <!-- </div> -->

            </div>




          </div>
        </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>

</div>





<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

let ban = (id) => {

      let http = new XMLHttpRequest();
      let url = 'db/ban_user.php';
      let params = `user_id=${id}`;
      http.open('POST', url, true);

      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
          alert('User has been banned succesfully ');
          // alert(http.responseText);
          window.location.reload();
        }

      }
      http.send(params);
}

let activate = (id) => {

      let http = new XMLHttpRequest();
      let url = 'db/activate_user.php';
      let params = `user_id=${id}`;
      http.open('POST', url, true);

      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
          alert('User has been unbanned succesfully ');
          // alert(http.responseText);
          window.location.reload();
        }

      }
      http.send(params);
}



</script>
</body>
</html>
