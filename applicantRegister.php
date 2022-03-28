<?php

    include("connection.php");

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
        $orgName = $_POST['orgName'];
        $id = "Select orgID from organization where orgName = '$orgName'";
        $Id = mysqli_query($conn, $id);
        $i = mysqli_fetch_assoc($Id);
        $orgID = $i['orgID'];

        $sqluser = "INSERT INTO user (username, password, fullname, email, mobileNo) VALUES ('$username', '$password', '$_POST[fullname]', '$_POST[email]', '$_POST[mobileNo]')";
        $sqlapplicant = "INSERT INTO applicant (username, IDno, applicantAddress, householdIncome, orgName, orgID) VALUES ('$username', '$_POST[IDno]', '$_POST[applicantAddress]', '$_POST[householdIncome]', '$_POST[orgName]', '$orgID')";
        $sqldocument = "INSERT INTO document (filename, description, username) VALUES ('$document', '$_POST[description]', '$username')";
          if($save = mysqli_query($conn, $sqluser) && $save2 = mysqli_query($conn,$sqlapplicant) && $save2 = mysqli_query($conn,$sqldocument)){
?> 
            <p>
              <?php 
              echo '<script type="text/javascript">';
              echo 'alert("Username: ' .$username.' \nPassword: '.$password.' \n '.$orgID.'");';
              echo '</script>';
              echo "<script>setTimeout(\"location.href = 'applicantLogin.php';\",1500);</script>"; ?>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Humble Aid</title>
  </head>
  <body>

  <nav class="navbar fixed-top" style="background-color: #507daf;">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:white" >Humble Aid </a>
  </div>
</nav>

  <section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3" style="padding-top: 100px;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

                <div class="form-outline mb-4">
                <select name="orgName" class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option selected>Select Organization</option>
                  <?php
                      $connect = mysqli_connect("localhost","root","","humbleaid");
                      $orgName = mysqli_query($connect, "SELECT DISTINCT orgName FROM organization");
                      while ($orgrow = mysqli_fetch_array($orgName)) {
                        $nameorg = $orgrow['orgName'];
                        echo "<option value='$nameorg'>";
                        echo "$nameorg";
                        echo '</option>';
                        }
                  ?>
                </select>
                  </div>

                  <div class="form-outline mb-4">
                    <input
                    type="text"
                    class="form-control"
                    placeholder="John Doe"
                    name="fullname"
                    id="fullname"
                    aria-label="Full Name"
                    aria-describedby="basic-addon1"
                    required
                  />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="IDno" name="IDno" class="form-control" placeholder="123456-01-1254" required/>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" placeholder="johndoe@gmail.com" required/>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+60</span>
                    </div>
                    <input type="text" id="mobileNo" name="mobileNo" class="form-control" placeholder="123345622" required/>
                  </div>

                  <div class="form-outline mb-4">
                    <textarea class="form-control" id="applicantAddress" name="applicantAddress" rows="4" placeholder="Address" required></textarea>
                  </div>

                  <div class="form-outline mb-4">
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">RM</span>
                  </div>
                  <input type="text" class="form-control" id="householdIncome" name="householdIncome" aria-label="Amount" placeholder="1000.00" required>
                </div>
                  </div>

                  <div class="form-outline mb-4">
                  <div class="input-group mb-3">
                  <input type="file" name="document" id="document" class="form-control" id="inputGroupFile02" required>
                  </div>
                  </div>

                  <div class="form-outline mb-4">
                  <div class="form-outline">
                  <textarea class="form-control" id="description" rows="4" name="description" placeholder="Description" required></textarea>
                  <label class="form-label" for="textAreaExample"></label>
                  </div>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" id="register" name="register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" style="background-color: #507daf;">Register</button>
                  </div>


                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="applicantLogIn.php" class="fw-bold text-body"><u>Login here</u></a></p>
                  


                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>