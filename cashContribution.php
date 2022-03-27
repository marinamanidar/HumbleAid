<?php 

include("connection.php");
session_start();

$appealID = $_GET['appealID'];
$appeal = "SELECT * FROM `appeal` WHERE appealID = '$appealID'";
$appeals = $conn->query($appeal);
while($appealA = mysqli_fetch_assoc($appeals)){
    $id = $appealA['appealID'];
}   

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Organise Aid Appeal</title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
        <!--CSS-->
        <link rel="stylesheet" href="organiseAidAppeal.css">
        
    </head>

    <body>
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-light bg-light" style="background-color: #507daf;">
            <div class="container-fluid">
                <a class="navbar-brand">Humble Aid </a>
                <form class="d-flex">
                    <p style="padding: 0px 50px; text-align:center;">Donor</p>
                </form>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar" style="padding-top: 100px;">
            <a class="active" href="cashDonation.php">Donor Cash Contribution</a>
        </div>

        <div class="content">
            <div class="aidform text-center">   
                <h3>Donor Cash Contribution</h3>
            </div>
            <br><br>
            <div class="aidform">
                <form class="form" method="POST" action="recordConCash.php">
                    <h3 style="text-align: center;">Add Cash Donation</h3>
                    <input type="hidden" class="form-control" name="appealID" id="appealID" style="visibility: hidden;" value="<?php echo $id ?>">
                    <!--org rep page cash amount-->
                    <div class="form-group">
                        <label class="label">Cash Amount</label>
                        <input type="number_format" class="form-control" id="cash" name="cash" required>
                    </div>

                    <!--org rep page payment channel-->
                    <div class="form-group">
                        <label class="label">Payment Channel</label>
                        <input type="text" class="form-control" id="paymentChannel" name="paymentChannel" required>
                    </div>

                    <!--org rep page reference no-->
                    <div class="form-group">
                        <label class="label">Reference No</label>
                        <input type="text" class="form-control" id="referenceNo" name="referenceNo" required>
                    </div>

                    <button type="submit" name="add2" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        
    </body>
</html>

