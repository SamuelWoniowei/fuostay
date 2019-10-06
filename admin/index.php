<?php
  require_once('../startsession.php');


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
<!-- Default form login -->
<form class="text-center border border-light p-5" style="width: 35%; margin: auto; margin-top:12%;">

    <p class="h4 mb-4">Admin login</p>
    <small id="login_error" class="form-text text-muted mb-4 text-danger"></small>
    <!-- Email -->
    <input type="email" id="username" class="form-control mb-4" placeholder="username">

    <!-- Password -->
    <input type="password" id="password" class="form-control mb-4" placeholder="Password">

    <div class="d-flex justify-content-around">

    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" id="submit_form" type="submit">Sign in</button>


</form>
<!-- Default form login -->
<script>
let login = (e) => {
  e.preventDefault();

  // variables for login input fields
  let username = document.querySelector('#username').value;
  let password = document.querySelector("#password").value;

console.log(`username: ${username} and password = ${password}`);



      let http = new XMLHttpRequest();
      let url = 'db/login.php';
      let params = `username=${username}&password=${password}`;
      http.open('POST', url, true);

      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
          if (http.responseText == "invalid") {
            document.querySelector('#login_error').innerHTML = "Invalid login details";

          }
          else {
            window.location.href = "dashboard.php";
          }

        }

      }
      http.send(params);

}

document.querySelector("#submit_form").addEventListener("click", login, false);

</script>

</body>
</html>
