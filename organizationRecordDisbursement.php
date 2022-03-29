<?php
    include("connection.php");
    session_start();

    //$_SESSION["orgID"] ="select orgID from organizationrepresentative where username = '".$_SESSION["username"]."'";
    $username = $_SESSION['username'];
    $getId = "Select * from organizationrepresentative where username = '$username'";
    $resultId = $conn->query($getId);
    $rowId = $resultId-> fetch_assoc();
    $orgID = $rowId['orgID'];

    $getresult = "Select * from appeal where orgID = '$orgID'";
    $result = $conn->query($getresult);
    $getOrg = "Select * from organization where orgID = '$orgID'";
    $resultOrg = $conn->query($getOrg);
    $rowOrg = $resultOrg-> fetch_assoc();

    if(isset($_POST['btn_logic'])){
    $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $shfl = str_shuffle($comb);
    $disbursementID = substr($shfl,0,10);
    $cashAmount = $_POST['cashAmount'];
    $disbursementDate = $_POST['date'];
    $goodsDisbursed = $_POST['goods'];
    
        $sqlU = "UPDATE appeal SET outcome='disbursed' WHERE appealID = '$appealID'";
        $resultU = mysqli_query($conn,$sqlU);
        //insert disbursement
        $sqldisbursement = "INSERT INTO disbursement (disbursementID, cashAmount, disbursementDate, goodsDisbursed, username, appealID) VALUES ('$disbursementID', '$cashAmount', '$disbursementDate', '$goodsDisbursed', '$_COOKIE[uname]', '$_COOKIE[app]')";
        if($save = mysqli_query($conn, $sqldisbursement)){
        ?>
            <p>
                <?php 
                    echo '<script type="text/javascript">';
                    echo 'alert("Disbursement successfully added!");';
                    echo '</script>';?>
            </p>
        <?php
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Organization</title>
        <script type="text/javascript" src="organizationRecordDisbursement.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <style>
            table{
                border-collapse: collapse;
                width: 100%;
                font-size: 20px;
                text-align: left;
            }

            th{
                background-color: #507daf;
                color: white;
            }

            tr:nth-child(odd){
                background-color: #f2f2f2;
            }

        </style>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
   
        <!--CSS-->
        <link rel="stylesheet" href="organizationDashboard.css">
    </head>

    <body>
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-light bg-light" style="background-color: #507daf;">
            <div class="container-fluid">
                <a class="navbar-brand">Humble Aid </a>
                <form class="d-flex">
                    <a class="btn" href="logout.php" role="button">Log Out</a>
                </form>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar" style="padding-top: 100px;">
            <a href="organizationDashboard.php">Dashboard</a>
            <a href="orgRepRegisterApp.php">Record Applicant</a>
            <a class="active" href="organizationRecordDisbursement.php">Record Disbursement</a>
            <a href="organiseAidAppeal.php">Organize Appeal</a>
            <a href="recordCon.php">Record Contribution</a>
        </div>

        <div class="content" style="padding-top: 100px;">
            <div class="container">
            <h1><?php echo $rowOrg['orgName']; ?></h1>
            <?php
                if($result -> num_rows > 0){
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Appeal ID</th>";
                    echo "<th>Description</th>";
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row["appealID"] ."</td><td>". $row["description"] ."</td></tr>";
                    }
                    echo "</table>";
                    echo "<br>";
                    echo "<br>";
                    ?>

                    <select name="appealID" id="appealID" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="selectAppealID()">
                    <option selected>Choose Appeal ID</option>
                    <?php
                      $connect = mysqli_connect("localhost","root","","humbleaid");
                      $appealID = mysqli_query($connect, "SELECT DISTINCT appealID FROM appeal where outcome = 'Active' and orgID = '$orgID'");
                      while ($appealrow = mysqli_fetch_array($appealID)) {
                        $appealno = $appealrow['appealID'];
                        echo "<option value='$appealno'>";
                        echo "$appealno";
                        echo '</option>';
                        }
                    ?>
                </select>
                <br>
                

                <table id="ans">
                </table>
                    <br>
                

                <table id="answer">
                </table>
                <br>

                <table id="an">
                </table>
                <br>

                <div id="ann">
                </div> 

                <?php
                    }
                else{
                    echo "There are no appeals available";
                }
            
            ?>

            </div>
        </div>
    </body>
</html>





