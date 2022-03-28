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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Record Contribution</title>
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
            <a href="orgRepRegisterApp.php">Add Applicants</a>
            <a href="#">Record Disbursement</a>
            <a href="organiseAidAppeal.php">Organise Aid Appeals</a>
            <a class="active" href="recordContribution.php">Record Contribution</a>
        </div>

        <div class="content">
            <div class="aidform text-center">
                <h3 id="organization" name="organization"><?php echo $orgNa ?></h3>
                <input type="hidden" class="form-control" name="orgID" id="displayID" style="visibility: hidden;" value="<?php echo $orgIDD ?>">     
            </div>
            <br><br>
            <div class="table-responsive dt-responsive">
                <table class="table table-dark text-center">
                    <thead>
                        <th>Appeal ID</th>
                        <th>Description</th>
                        <th>Organization ID</th>
                        <th>Select</th>
                    </thead>
                    <tbody>
                        <!--to show all the appeal in same org ID-->
                        <?php
                            $appeal = "SELECT * FROM `appeal` WHERE orgID = '$orgIDD'";
                            $appeals = mysqli_query($conn, $appeal);
                            while($appealA = mysqli_fetch_array($appeals)){
                                echo "<tr>
                                <td>$appealA[appealID]</td>
                                <td>$appealA[description]</td>
                                <td>$appealA[orgID]</td>
                                <td><a href='recordCon.php?appealID=$appealA[appealID]'><button type='button' class='btn btn-primary'>Select</button></a></td>  
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
</html>

