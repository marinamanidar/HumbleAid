<?php
   include("connection.php");

    if (isset($_POST['register'])) {
        //$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
        $IDno = $_POST['IDno'];
        $email = $_POST['email'];

        $sqluser = "INSERT INTO 'user' ('username', 'password', 'fullname', 'email', 'mobileNo') VALUES ('$_POST[fullname]', '$_POST[fullname]', '$_POST[fullname]', '$email', '$_POST[mobile]')";
        $sqlapplicant = "INSERT INTO 'applicant' ('username', 'IDno', 'applicantAddress', 'householdIncome') VALUES ('$_POST[fullname]', '$IDno', '$_POST[applicantAddress]', '$_POST[householdincome]')";

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

  <nav class="navbar fixed-top" style="background-color: #507daf;">
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

<form class="form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<div class="input-group mb-3">
  <input
    type="text"
    class="form-control"
    placeholder="John Doe"
    name = "fullname"
    aria-label="Full Name"
    aria-describedby="basic-addon1"
  />
</div>

<div class="input-group mb-3">
  <input
    type="email"
    class="form-control"
    id="email"
    placeholder="johndoe@gmail.com"
    aria-label="email"
    name="email"
    aria-describedby="basic-addon1"
  />
</div>

<div class="form-outline">
  <input type="text" class="form-control" name="IDno" placeholder="123456-01-1254"/>
  <label class="form-label" for="typeText"></label>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">+60</span>
  </div>
  <input type="text" class="form-control" name="mobileNo" placeholder="0123345622" />
</div>

<div class="form-outline">
  <textarea class="form-control" rows="4" name="applicantAddress" placeholder="Address"></textarea>
  <label class="form-label" for="textAreaExample"></label>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">RM</span>
  </div>
  <input type="text" class="form-control" aria-label="Amount" name="householdincome" placeholder="1000.00">
</div>

<div class="input-group mb-3">
<div class="form-outline">
<input class="form-control" type="file" name="document" multiple placeholder="Documents"/>
</div>
</div>

<div class="form-outline">
  <textarea class="form-control" rows="4" name="description" placeholder="Description"></textarea>
  <label class="form-label" for="textAreaExample"></label>
</div>
    <!-- Tab content -->
  </div>
</div>

<button type="submit" name="register" class="btn btn-primary btn-lg btn-block" style="background-color: #507daf;">Register</button>

</from>

<!-- Page content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
