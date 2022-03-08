<?php

    include("connection.php");
    session_start();

    $que="select * from user where username = '".$_SESSION["username"]."'";
    $query=$conn->query($que);
      while($row=mysqli_fetch_array($query))
      {
        //print_r($row);
        extract($row);
        $name = $row['fullname'];
        $user = $row['username'];
      }

    if (isset($_POST['register'])) {
        //$upload_image = $_FILES['document']['name'];
        //$folder = "/xampp/htdocs/HumbleAid/uploads/";
        //move_uploaded_file($_FILES[" document "][" tmp_name "], "$folder".$_FILES[" document "][" name "]);
        //set input into variables
        $email= $_POST['email'];
        //get row with the same email
        $sqlemail = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($conn,$sqlemail);
        //if the email entered is already registered then send alert
        if(mysqli_num_rows($res) > 0){
        echo '<script>alert("Email already registered!")</script>';
        }
        else{
        //$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        $fullname = $_POST['fullname'];
        $username = str_replace(' ', '', $fullname);
        $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $shfl = str_shuffle($comb);
        $password = substr($shfl,0,10);
        $document = $_POST['document'];
        

        $sqluser = "INSERT INTO user (username, password, fullname, email, mobileNo) VALUES ('$username', '$password', '$_POST[fullname]', '$_POST[email]', '$_POST[mobileNo]')";
        $sqlapplicant = "INSERT INTO applicant (username, IDno, applicantAddress, householdIncome, orgName) VALUES ('$username', '$_POST[IDno]', '$_POST[applicantAddress]', '$_POST[householdIncome]', 'UNO Organization')";
        $sqldocument = "INSERT INTO document (filename, description, username) VALUES ('paymentslip.pdf', '$_POST[description]', '$username')";
          if($save = mysqli_query($conn, $sqluser) && $save2 = mysqli_query($conn,$sqlapplicant) && $save2 = mysqli_query($conn,$sqldocument)){
?>
            <p>
              <?php 
              echo '<script type="text/javascript">';
              echo 'alert("Username: ' .$username.' \nPassword: '.$password.'");';
              echo '</script>';
              echo "<script>setTimeout(\"location.href = 'orgRepRegisterApp.php';\",1500);</script>"; ?>
            </p>
<?php
        }
    }
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
        <p style="margin: 5px; padding: 5px"><?php echo $name; ?></p>; 
      <button class="btn" type="submit"><a href="index.php" class="fw-bold text-body">Log Out</button>
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

<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="input-group mb-3">
  <input
    type="text"
    class="form-control"
    placeholder="John Doe"
    name = "fullname"
    id="fullname"
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
  <input type="text" class="form-control" id="IDno" name="IDno" placeholder="123456-01-1254"/>
  <label class="form-label" for="typeText"></label>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">+60</span>
  </div>
  <input type="text" class="form-control" id="mobileNo" name="mobileNo" placeholder="0123345622" />
</div>

<div class="form-outline">
  <textarea class="form-control" rows="4" id="applicantAddress" name="applicantAddress" placeholder="Address"></textarea>
  <label class="form-label" for="textAreaExample"></label>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">RM</span>
  </div>
  <input type="text" class="form-control" aria-label="Amount" id="householdIncome" name="householdIncome" placeholder="1000.00">
</div>

<div class="input-group mb-3">
<div class="form-outline">
<input class="form-control" type="file" id="document" name="document" multiple placeholder="Documents"/>
</div>
</div>

<div class="form-outline">
  <textarea class="form-control" rows="4" id="description" name="description" placeholder="Description"></textarea>
  <label class="form-label" for="textAreaExample"></label>
</div>
<button type="submit" id="register" name="register" class="btn btn-primary btn-lg btn-block" style="background-color: #507daf;">Register</button>
    <!-- Tab content -->
  </div>
</div>

</form>

<!-- Page content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
