<?php 

include("connection.php");
session_start();
$que="select * from user where username = '".$_SESSION["username"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query)){
    //print_r($row);
    extract($row);
    $name = $row['fullname'];
    $user = $row['username'];
}

$orgid = "SELECT orgID FROM `organizationrepresentative` WHERE username = '$username'";
$orgI = $conn->query($orgid);
$orgDD = $orgI->fetch_assoc();
$orgIDD = $orgDD['orgID'];


$orgname = "SELECT orgName FROM `organization` WHERE orgID = '$orgIDD'";
$orgN = $conn->query($orgname);
$org = $orgN->fetch_assoc();
$orgNa = $org['orgName'];

$appealID = $_GET['appealID'];
$appeal = "SELECT * FROM `appeal` WHERE appealID = '$appealID'";
$appeals = $conn->query($appeal);
while($appealA = mysqli_fetch_assoc($appeals)){
    $id = $appealA['appealID'];
    $fromdate = $appealA['fromDate'];
    $todate = $appealA['toDate'];
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
                    <p style="padding: 0px 50px; text-align:center;"><?php echo $name ?></p>
                    <button class="btn" type="submit"><a href="index.php" class="fw-bold text-body">Log Out</button>
                </form>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar" style="padding-top: 100px;">
            <a href="organizationDashboard.php">Dashboard</a>
            <a href="orgRepRegisterApp.php">Record Applicant</a>
            <a href="organizationRecordDisbursement.php">Record Disbursement</a>
            <a href="organiseAidAppeal.php">Organize Appeal</a>
            <a class="active" href="recordCon.php">Record Contribution</a>
        </div>

        <div class="content">
            <div class="aidform text-center">
                <h3 id="organization" name="organization"><?php echo $orgNa ?></h3>
                <input type="hidden" class="form-control" name="orgID" id="displayID" style="visibility: hidden;" value="<?php echo $orgIDD ?>">
                <h5 id="fromdate" name="fromdate">From Date : <?php echo $fromdate ?></h5>
                <h5 id="todate" name="todate">To Date : <?php echo $todate ?></h5>
            </div>

            <br><br>

            <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Goods
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form class="form" method="POST" action="recordConGoods.php">
                        <h3 style="text-align: center;">Add Goods</h3>
                        <input type="hidden" class="form-control" name="appealID" id="appealID" style="visibility: hidden;" value="<?php echo $id ?>">
                        <!--org rep page description-->
                        <div class="form-group">
                            <label class="label">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description" required></textarea>
                        </div>

                        <!--org rep page estimated value-->
                        <div class="form-group">
                            <label class="label">Estimated Value</label>
                            <input type="number_format" class="form-control" id="estimatedValue" name="estimatedValue" required>
                        </div>

                        <button type="submit" name="add1" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Cash Donation
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
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
            </div>
            </div>     
        </div>
    </body>
</html>