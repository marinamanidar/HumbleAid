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

$today = date("Y-m-d");

$orgid = "SELECT orgID FROM `organizationrepresentative` WHERE username = '$username'";
$orgI = $conn->query($orgid);
$orgDD = $orgI->fetch_assoc();
$orgIDD = $orgDD['orgID'];

$orgname = "SELECT orgName FROM `organization` WHERE orgID = '$orgIDD'";
$orgN = $conn->query($orgname);
$org = $orgN->fetch_assoc();
$orgNa = $org['orgName'];

$orgaddress = "SELECT orgAddress FROM `organization` WHERE orgID = '$orgIDD'";
$address = $conn->query($orgaddress);
$orgA = $address->fetch_assoc();
$orgAdd = $orgA['orgAddress'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $fromDate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $description = $_POST['description'];
    $outcome = "Active";

    $query = "INSERT INTO `appeal`(`appealID`, `fromDate`, `toDate`, `description`, `outcome`, `orgID`, `orgName`, `orgAddress`) VALUES ('appealID', '$fromDate', '$todate', '$description', '$outcome', $orgIDD, '$orgNa', '$orgAdd')";
    $save = mysqli_query($conn, $query);

    echo "<script> alert('Aid Appeal Save') </script>";
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
        

        <!--JavaScript, JQuery-->
        <script>
            function displayDate(){
                var date = document.getElementById("fromdate").value;
                document.getElementById("todate").min = date;
            }
        </script>
        
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
            <a href="organizationRecordDisbursement.php">Record Disbursement</a>
            <a class="active" href="organiseAidAppeal.php">Organize Appeal</a>
            <a href="recordCon.php">Record Contribution</a>
        </div>

        <div class="content">
            <div class="aidform">
                <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h3 id="organization" name="organization" style="text-align: center;"><?php echo $orgNa ?></h3>
                    <input type="hidden" class="form-control" name="orgID" id="displayID" style="visibility: hidden;" value="<?php echo $orgIDD ?>">
                    <input type="hidden" class="form-control" name="orgID" id="displayID" style="visibility: hidden;" value="<?php echo $orgAdd ?>">
                    <!--organization rep page from date-->
                    <div class="form-group">
                        <label class="label">From Date</label>
                        <input type="date" class="form-control" id="fromdate" min="<?php echo $today ?>" name="fromdate" onchange="displayDate()" required>
                    </div>

                    <!--organization rep page to date-->
                    <div class="form-group">
                        <label class="label">To Date</label>
                        <input type="date" class="form-control" id="todate" name="todate" required>
                    </div>

                    <!--organization rep page description-->
                    <div class="form-group">
                        <label class="label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
            
        </div>

    </body>
</html>