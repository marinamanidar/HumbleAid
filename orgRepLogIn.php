<?php
   include("connection.php");
   session_start();
 
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form 
      
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 

      //get row which email and password = to input
      $sql = "SELECT username FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      
      $count = mysqli_num_rows($result);
      
      // If result matched email and password, table row must be 1 row
      if($count == 1) {
          //set the row to current session
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         
         header("location: orgRepRegisterApp.php");

      }else {
          //if not then send error msg
          echo '<script type="text/javascript">';
          echo 'alert("Email or password Invalid");';
          echo '</script>';
      }
   }
?>
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
                <h2 class="text-uppercase text-center mb-5">Log In As Organization Representative</h2>

                <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

                  <div class="form-outline mb-4">
                    <input type="text" id="username" name="username" class="form-control" placeholder="John Doe"/>
                  </div>

                  <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="*******" />
                  </div>
                
                  <button type="submit" name="btn_logic" class="col-12 btn btn-secondary btn-lg btn-block" style="background-color:#507daf ;">Log In</button>

                  <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="#!" class="fw-bold text-body"><u>Sign Up</u></a></p>

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