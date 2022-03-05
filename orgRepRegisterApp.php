<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['signup'])) {
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
$name_error = "Name must contain only alphabets and space";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if(strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}       
if(strlen($mobile) < 10) {
$mobile_error = "Mobile number must be minimum of 10 characters";
}
if($password != $cpassword) {
$cpassword_error = "Password and Confirm Password doesn't match";
}
if(mysqli_query($conn, "INSERT INTO users(name, email, mobile_number ,password) VALUES('" . $name . "', '" . $email . "', '" . $mobile . "', '" . md5($password) . "')")) {
header("location: login.php");
exit();
} else {
echo "Error: " : "" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="orgRepRegisterApp.css">

    <title>Humble Aid</title>
  </head>
  <body>

  <nav class="navbar fixed-top navbar-light bg-light" style="background-color: #507daf;">
  <div class="container-fluid">
    <a class="navbar-brand">Humble Aid </a>
    <form class="d-flex">
        <p style="margin: 5px; padding: 5px">John Doe</p>
      <button class="btn" type="submit">Log Out</button>
    </form>
  </div>
</nav>

  <!-- The sidebar -->

<div class="sidebar" style="padding-top: 100px;">
  <a href="#home">Dashboard</a>
  <a class="active" href="#news">Add Applicants</a>
  <a href="#contact">Record Disbursement</a>
  <a href="#about">Organizae Appeal</a>
  <a href="#about">Record Contribution</a>
</div>

<div class="content" style="padding-top: 100px;">
<h1 class="display-4">Add Aid Applicants</h1>
<div class="col-9">
    <!-- Tab content -->
    <div class="tab-content" id="v-pills-tabContent">
      <div
        class="tab-pane fade show active"
        id="v-pills-home"
        role="tabpanel"
        aria-labelledby="v-pills-home-tab"
      >

<div class="input-group mb-3">
  <input
    type="text"
    class="form-control"
    placeholder="John Doe"
    aria-label="Full Name"
    aria-describedby="basic-addon1"
  />
</div>

<div class="input-group mb-3">
  <input
    type="text"
    class="form-control"
    placeholder="johndoe@gmail.com"
    aria-label="email"
    aria-describedby="basic-addon1"
  />
</div>

<div class="form-outline">
  <input type="text" id="typeText" class="form-control" placeholder="123456-01-1254"/>
  <label class="form-label" for="typeText"></label>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">+60</span>
  </div>
  <input type="text" id="typeText" class="form-control" placeholder="123345622" />
</div>

<div class="form-outline">
  <textarea class="form-control" id="textAreaExample" rows="4" placeholder="Address"></textarea>
  <label class="form-label" for="textAreaExample"></label>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">RM</span>
  </div>
  <input type="text" class="form-control" aria-label="Amount" placeholder="1000.00">
</div>

<div class="input-group mb-3">
<div class="form-outline">
<input class="form-control" type="file" id="formFileMultiple" multiple placeholder="Documents"/>
</div>
</div>

<div class="form-outline">
  <textarea class="form-control" id="textAreaExample" rows="4" placeholder="Description"></textarea>
  <label class="form-label" for="textAreaExample"></label>
</div>
    <!-- Tab content -->
  </div>
</div>

<button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: #507daf;">Register</button>

<!-- Page content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
