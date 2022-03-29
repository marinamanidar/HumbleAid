<?php
   include("connection.php");
   session_start();

   $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Organization</title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
        <!--CSS-->
        <link rel="stylesheet" href="organizationDashboard.css">
    </head>

    <body>
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-light bg-light" style="background-color: #507daf;">
            <div class="container-fluid">
                <a class="navbar-brand">Humble Aid </a>
                <form class="d-flex">
                    <p style="padding: 0px 50px; text-align:center;"><?php echo $_SESSION["username"] ?></p>
                    <a class="btn" href="logout.php" role="button">Log Out</a>
                </form>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar" style="padding-top: 100px;">
            <a class="active" href="organizationDashboard.php">Dashboard</a>
            <a href="orgRepRegisterApp.php">Record Applicant</a>
            <a href="organizationRecordDisbursement.php">Record Disbursement</a>
            <a href="organiseAidAppeal.php">Organize Appeal</a>
            <a href="recordContribution.php">Record Contribution</a>
        </div>

        <br>
        <br>
        <div class="content" style="padding-top: 100px;">
            <div class="container">
                <h1>Welcome, <?php echo $username?></h1>
            </div>
        </div>

    </body>
</html>