<?php
require_once('startsession.php');
require_once('db/connect.php');
if (!isset($_SESSION['user_id'])) {
  header('location: index.php');
}


$id = $_SESSION['user_id'];
$sql = "SELECT * FROM listings WHERE type = 'roommate' AND uploader_id = '$id'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if (mysqli_num_rows($res)) {
  $row = mysqli_fetch_array($res);
  $marital_status = $row['marital_status'];
  $religion = $row['religion'];
  $age = $row['age'];
  $gender = $row['gender'];
  $hobbies = $row['hobbies'];
  $likes_dislikes = $row['likes_dislikes'];
  $allergies = $row['allergies'];
  $department = $row['department'];
  $faculty = $row['faculty'];
  $level = $row['level'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.png" />
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="./css/custom.css?<?php echo time() ?>" />
    <link rel="stylesheet" href="./css/sidebar.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Lobster|Nothing+You+Could+Do&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>User dashboard</title>
    <script src="../js/script.js"></script>

    <style>
    /* For the function */
    .msf_hide{
      display: none;
    }
    .msf_show{
      display: block;
    }
    .msf_bullet_o{
      display: flex;
      flex-flow: row wrap;
      justify-content: center;
    }
    .msf_bullet_o > div{
      height: 15px;
      width: 15px;
      margin: 20px 10px;
      border-radius: 100px;
      z-index: 2;
    }
    .msf_bullet{
      background-color: lightgrey;

    }
    .msf_bullet_active{
      background-color: darkgrey !important;
    }

    /* Just for decoration */
    body{
      background-color: #fff;
    }
    .msf_line{
      opacity: 0.3;
      background: lightgrey;
      height: 3px;
      width: 70px;
      display: block;
      left: 50%;
      margin-top: -29px;
      margin-left: -35px;
      position: absolute;
      z-index: 1;
    }
    .form_wrapper{
      padding: 10%;
    }
    fieldset{
      display: flex;
      flex-flow: row wrap;
      justify-content: center;
      box-shadow: rgba(0,0,0,0.1) 0px 1px 30px;
      border-radius: 0px;
      border: none;
      padding: 10px 20px !important;
    }
    input{
      display: block;
      width: 100%;
      height: 20px;
      margin: 15px 0px;
    }
    input[type="button"] {
      width: 15%;
      display: inline-block;
    }
    input[type="submit"] {
      width: 15%;
      margin: auto;
      display: block;
      margin-bottom: 5%;
      margin-top: 4%;
    }
    input[type="text"], input[type="email"]{
      outline: none;
      border: none;
      /* background-color: lightgrey; */
      border: 1px solid black;
      padding: 5px 0px!important;
      text-align: center;
      transition: all 250ms;
    }
    input[type="text"]:focus, input[type="email"]:focus{
      opacity: 0.5;
    }
    input[type="button"], input[type="submit"]{
      /* margin-top: 20px !important; */
      cursor: pointer;
      outline: none;
      border: none;
      padding: 15px !important;
      line-height: 0px;
      background-color: #fff;
      transition: all 150ms;
      box-shadow: rgba(0,0,0,0.2) 0px 1px 5px;
    }
    input[type="button"]:hover, input[type="submit"]:hover{
      background-color: darkgrey;
      color: white;
    }
    h2{
      text-align: center;
      font-size: 22px;
      font-family: opensans;
      font-weight: 400;
      display: block;
      margin-bottom: 25px !important;
    }
    form {
      padding: 40%;
    }
    .image-upload {
      border: 2px grey dashed;
      padding: 5%;
    }
    .image-upload p {
      color: grey;
    }
    .image-upload > input {
      display: none;
    }
    .image-upload  img {
      width: 100px;

    }
    @media only screen and (max-width: 700px) {
      input[type="button"] {
        width: 80%;
        margin:auto;
        display: block;
        margin-bottom: 6%;
      }
      input[type="submit"] {
        width: 80%;
        margin:auto;
        display: block;
        margin-bottom: 12%;
        margin-top: 6%;
      }
      .custom-checkbox {

        display: block;
        margin-bottom: 6%;

      }
      .form_wrapper {
        padding: 0;
      }

    }
  </style>
</head>
<body>

  <div class="d-flex" id="wrapper">



      <?php require_once('components/dash-nav.php'); ?>

      <div class="container dashboard-container" style="margin-top: 4%;">
        <h2>Find your roommate(s) </h2>


<!-- One "tab" for each step in the form: -->
<form class="form_wrapper" method="post" enctype="multipart/form-data" novalidate id="upload-house-form" action="db/findroommate.php" style="margin-top: -8%">
<fieldset class="msf_hide">
  <p class="h4 mb-4">Tell us about yourself:</p>
  <p>So far, we already know your name, email address and phone number through the sign up form </p>



    <div class="form-row mb-4">
        <div class="col">
          <select class="browser-default custom-select" name="marital_status"  >
            <option value="">Marital status</option>
            <option value="married"  <?php if (isset($marital_status) && $marital_status == 'married') echo "selected" ?>>Married</option>
            <option value="single"   <?php if (isset($marital_status) && $marital_status == 'single') echo "selected" ?>>Single</option>


          </select>
      </div>

        <div class="col">
          <select class="browser-default custom-select" name="religion"  >
            <option value="">Religion</option>
            <option value="christianity" <?php if (isset($religion) && $religion == 'christianity') echo "selected" ?> >Christianity</option>
            <option value="islam" <?php if (isset($religion) && $religion == 'islam') echo "selected" ?> >Islam</option>
            <option value="none"  <?php if (isset($religion) && $religion == 'none') echo "selected" ?> >No religion</option>

          </select>

        </div>
    </div>

    <div class="form-row mb-4">

        <div class="col">
          <select class="browser-default custom-select" name="gender"  >
            <option selected value="">Gender</option>
            <option value="male" <?php if (isset($gender) && $gender == 'male') echo "selected" ?>>Male</option>
            <option value="female" <?php if (isset($gender) && $gender == 'female') echo "selected" ?> >Female</option>

          </select>

        </div>
      <div class="col">
        <input type="number" class="form-control" placeholder="age" name="age" oninput="this.className = 'form-control'" value="<?php if(isset($age)) echo $age ?>">
    </div>
</div>
<div class="form-row mb-12">
  <div class="col">
    <div class="md-form amber-textarea active-amber-textarea">
      <label for="form22">What are your hobbies?</label><br>
    <textarea id="form22" name="hobbies" class="md-textarea form-control" rows="3" required><?php if(isset($hobbies)) echo $hobbies ?></textarea>

    </div>
  </div>
  <div class="col">
    <div class="md-form amber-textarea active-amber-textarea">
      <label for="form22">What are your likes and dislikes</label><br>
    <textarea id="form22" name="likes_dislikes" class="md-textarea form-control" rows="3" required><?php if(isset($likes_dislikes)) echo $likes_dislikes ?></textarea>

    </div>
    </div>
  </div>



<div class="md-form amber-textarea active-amber-textarea">
  <label for="form22">Do you have an allergies? if yes, please tell us about them</label><br>
<textarea id="form22" name="allergies" class="md-textarea form-control" rows="3" required> <?php  if(isset($allergies)) echo $allergies ?></textarea>

</div>


    <input type="button" name="back" value="Back" style="display:none"  onclick="msf_btn_back()">
    <input type="button" name="next" value="Continue"  onclick="msf_btn_next()">
  <div class="msf_bullet_o"></div>
  <div class="msf_line"></div>

</fieldset>
<fieldset class="msf_hide">
  <p class="h4 mb-4">Tell us about your education:</p>
  <select class="browser-default custom-select" name="faculty" >
    <option value="">Faculty</option>
    <option value="science" <?php if(isset($faculty) && $faculty == 'science') echo 'selected'; ?> >Science</option>
    <option value="management" <?php if(isset($faculty) && $faculty == 'management') echo 'selected'; ?> >Management science</option>
    <option value="humanities" <?php if(isset($faculty) && $faculty == 'humanities') echo 'selected'; ?> >Humanities</option>
    <option value="engineering" <?php if(isset($faculty) && $faculty == 'engineering') echo 'selected'; ?>  >Engineering</option>
  </select>
    <br><br>

  <select class="browser-default custom-select" name="department" >
    <option value="">Department</option>
    <option value="computer_science" <?php if(isset($department) && $department == 'computer_science') echo 'selected'; ?>  >Computer science</option>
    <option value="biochemistry" <?php if(isset($department) && $department == 'biochemistry') echo 'selected'; ?>  >Biochemistry</option>
    <option value="mathematics" <?php if(isset($department) && $department == 'mathematics') echo 'selected'; ?>  >Mathematics and statistics</option>
  </select>
  <br><br>

  <select class="browser-default custom-select" name="level">
    <option value="">Level</option>
    <option value="1" <?php if(isset($level) && $level == 1) echo 'selected'; ?>  >1</option>
    <option value="2" <?php if(isset($level) && $level == 2) echo 'selected'; ?> >2</option>
    <option value="3" <?php if(isset($level) && $level == 3) echo 'selected'; ?> >3</option>
    <option value="4" <?php if(isset($level) && $level == 4) echo 'selected'; ?> >4</option>
    <option value="5" <?php if(isset($level) && $level == 5) echo 'selected'; ?> >5</option>
    <br><br>
  </select>


  <input type="button" name="back" value="Back"  onclick="msf_btn_back()">
  <input type="button" name="next" value="Continue"  onclick="msf_btn_next()">
  <div class="msf_bullet_o"></div>
  <div class="msf_line"></div>
</fieldset>
<fieldset class="msf_hide">

  <div class="image-upload">
    <h1>Drop images here or click to upload</h1>
    <p>Allowed files are jpg, jpeg and png</p>
    <label for="fileupload">
      <img src="https://goo.gl/pB9rpQ" />
    </label>
  <input type="file" id="fileupload" name="files[]" multiple />

<div id="dvPreview">
</div>

</div>

<input type="submit" name="submit" id="submit" value="Submit Now!"  >


<input type="button" name="back" value="Back"  onclick="msf_btn_back()">

<input type="button" name="next" value="Next" style="display:none"  onclick="msf_btn_next()">

<div class="msf_bullet_o"></div>
<div class="msf_line"></div>
</fieldset>

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

var showSubmit = document.querySelector('#submit');
showSubmit.style.display = 'none';


// dom variables
var msf_getFsTag = document.getElementsByTagName("fieldset");

// declaring the active fieldset & the total fieldset count
var msf_form_nr = 0;
var fieldset = msf_getFsTag[msf_form_nr];
fieldset.className = "msf_show";

// creates and stores a number of bullets
var msf_bullet_nr = "<div class='msf_bullet'></div>";
var msf_length = msf_getFsTag.length;
for (var i = 1; i < msf_length; ++i) {
    msf_bullet_nr += "<div class='msf_bullet'></div>";
};
// injects bullets
var msf_bullet_o = document.getElementsByClassName("msf_bullet_o");
for (var i = 0; i < msf_bullet_o.length; ++i) {
    var msf_b_item = msf_bullet_o[i];
    msf_b_item.innerHTML = msf_bullet_nr;
};

// removes the first back button & the last next button
document.getElementsByName("back")[0].className = "msf_hide";
document.getElementsByName("next")[msf_bullet_o.length - 1].className = "msf_hide";

// Makes the first dot active
var msf_bullets = document.getElementsByClassName("msf_bullet");
msf_bullets[msf_form_nr].className += " msf_bullet_active";

// Validation loop & goes to the next step
function msf_btn_next() {
    var msf_val = true;

    var msf_fs = document.querySelectorAll("fieldset")[msf_form_nr];
    var msf_fs_i_count = msf_fs.querySelectorAll("input").length;

    for (i = 0; i < msf_fs_i_count; ++i) {
        var msf_input_s = msf_fs.querySelectorAll("input, select, textarea")[i];

        if (msf_input_s.getAttribute("type") === "button") {
            // nothing happens
        } else {
            if (msf_input_s.value === "") {
                msf_input_s.style.backgroundColor = "pink";
                msf_val = false;
            }
            else {
                if (msf_val === false) {} else {
                    msf_val = true;
                    msf_input_s.style.backgroundColor = "lime";
                }
            }
        };
    };
    if (msf_val === true) {
        // goes to the next step
        var selection = msf_getFsTag[msf_form_nr];
        selection.className = "msf_hide";
        msf_form_nr = msf_form_nr + 1;
        var selection = msf_getFsTag[msf_form_nr];
        selection.className = "msf_show";
        // refreshes the bullet
        var msf_bullets_a = msf_form_nr * msf_length + msf_form_nr;
        msf_bullets[msf_bullets_a].className += " msf_bullet_active";
    }
};

// goes one step back
function msf_btn_back() {
    msf_getFsTag[msf_form_nr].className = "msf_hide";
    msf_form_nr = msf_form_nr - 1;
    msf_getFsTag[msf_form_nr].className = "msf_showhide";
};

function uploadPictures() {

      var fileUpload = document.getElementById("fileupload");

        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.querySelector("#dvPreview");
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;

            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                console.log(regex.test(file.name.toLowerCase()));
                if (regex.test(file.name.toLowerCase())) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "100";
                        img.width = "100";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);

                    }
                    reader.readAsDataURL(file);

                    showSubmit.style.display = 'block';
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }

            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }


}


document.querySelector('#fileupload').addEventListener('change', uploadPictures, false);



</script>



</body>
</html>
