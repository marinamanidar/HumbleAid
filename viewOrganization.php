<?php
    include("connection.php");
    session_start();

    $orgID = $_SESSION["orgID"] ;
    $result = "Select * from organization where orgID= '$orgID'";
    $res = mysqli_query($conn,$result);
    $rowOrg = $res-> fetch_assoc();
    $orgName = $rowOrg['orgName'];
    $orgAddress = $rowOrg['orgAddress'];
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

  <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #F5F5F5;
}

.card{
    width: 350px;
    height: 450px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 50px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}

.card img{
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin: 5px;
}

.card .details{
    margin: 10px;
}

.card .details h2{
    font-weight: 600;
}

.card .details p{
    text-transform: uppercase;
    font-weight: 300;
}
  </style>
  <body>

  <nav class="navbar fixed-top" style="background-color: #507daf;">
  <div class="container-fluid">
    <a class="navbar-brand">Humble Aid </a>
  </div>
</nav>


    <div class="card">
        <div class="details">
            <h2><?php echo $orgName?></h2>
            <p>located at</p>
        </div>
        <p id="info"><?php echo $orgAddress?></p>
    </div>
<!-- Page content -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>