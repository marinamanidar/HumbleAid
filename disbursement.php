<?php
    include("connection.php");
    session_start();
    $username = $_SESSION["applicant"] ;
    $getDoc = "Select * from document where username = '$username'";
    $resultDoc = $conn->query($getDoc);
    $rowDoc = $resultDoc-> fetch_assoc();
    
    if (isset($_POST['register'])) {
        //$upload_image = $_FILES['document']['name'];
        //$folder = "/xampp/htdocs/HumbleAid/uploads/";
        //move_uploaded_file($_FILES[" document "][" tmp_name "], "$folder".$_FILES[" document "][" name "]);
        //set input into variables
        //$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        $appealID = $_SESSION["appealID"] ;
        $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $shfl = str_shuffle($comb);
        $disbursementID = substr($shfl,0,10);
        $cashAmount = $_POST['cashAmount'];
        $disbursementDate = $_POST['disbursedDate'];
        $goodsDisbursed = $_POST['goodsDisbursed'];

        $sqldisbursement = "INSERT INTO `disbursement` (`disbursementID`, `cashAmount`, `disbursementDate`, `goodsDisbursed`, `username`, `appealID`) VALUES ('$disbursementID', '$cashAmount', '$disbursementDate', '$goodsDisbursed', '$username', '$appealID')";
          if($save = mysqli_query($conn, $sqldisbursement)){
?>
            <p>
              <?php 
              echo '<script type="text/javascript">';
              echo 'alert("Disbursement created.");';
              echo '</script>';
              echo "<script>setTimeout(\"location.href = 'organizationRecordDisbursement.php';\",1500);</script>"; ?>
            </p>
<?php
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

  <nav class="navbar fixed-top navbar-light bg-light" style="background-color: #507daf;">
  <div class="container-fluid">
    <a class="navbar-brand">Humble Aid </a>
    <form class="d-flex">
      <button class="btn" type="submit">Log Out</button>
    </form>
  </div>
</nav>

  <!-- The sidebar -->

  <div class="sidebar" style="padding-top: 100px;">
            <a href="organizationDashboard.php">Dashboard</a>
            <a href="manageOrganization.php">Manage Organization</a>
            <a class="active" href="organizationRecordDisbursement.php">Record Disbursement</a>
            <a href="organiseAidAppeal.php">Organize Appeal</a>
            <a href="recordCon.php">Record Contribution</a>
        </div>

    <div class="content" style="padding-top: 100px; text-align:center">

<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["username"] ;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["applicantAddress"] ;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Household Income</label>
    <div class="col-sm-10">
    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($rowDoc['filename'] ).'" height="200" width="200" class="img-thumnail" />'?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Documents</label>
    <div class="col-sm-10">
    <input type="number" step=".01" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["householdIncome"] ;?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Disbursement Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="disbursedDate" name="disbursedDate" placeholder="" min="2022-04-05" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Cash Amount</label>
    <div class="input-group-prepend">
        <span class="input-group-text">RM</span>
    </div>
    <div class="col-sm-9">
      <input type="number" step="0.01" class="form-control" id="cashAmount" name="cashAmount" placeholder="" min="2018-01-01" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Goods Disbursed</label>
    <div class="col-sm-9">
    <textarea class="form-control" id="goodsDisbursed" rows="4" name="goodsDisbursed" placeholder="" required></textarea>
    </div>
  </div>
  
    <button type="submit" id="register" name="register" class="btn btn-primary">Submit</button>
    

    </div>
<!-- Page content -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>