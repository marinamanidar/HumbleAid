<?php
    include("connection.php");
    session_start();

    //$_SESSION["orgID"] ="select orgID from organizationrepresentative where username = '".$_SESSION["username"]."'";

    $getRep = "Select * from organizationrep where username = '".$_SESSION["username"]."'";
    $resultRep = $conn->query($getOrg);
    $rowRep = $resultOrg-> fetch_assoc();
    $orgID = $rowRep['orgID'];

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
                    <p style="padding: 0px 50px; text-align:center;">John</p>
                    <button class="btn-logout btn-outline-success" type="submit">Log Out</button>
                </form>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar" style="padding-top: 100px;">
            <a href="organizationDashboard.php">Dashboard</a>
            <a href="manageOrganization.php">Manage Organization</a>
            <a class="active" href="manageOrganization.php">Record Disbursement</a>
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
                      $appealID = mysqli_query($connect, "SELECT DISTINCT appealID FROM appeal where orgID = '".$_SESSION["orgID"]."'");
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

        <?php
            $name = $_COOKIE['uname'];
            $appeal = $_COOKIE['app'];
            // Set the expiration date to one hour ago
            setcookie("uname", "", time() - 3600);
            setcookie("app", "", time() - 3600);
            $app = "Select * from applicant where username= '$name'";
            $getApp = mysqli_query($conn,$app);
            $rowApp = mysqli_fetch_array($getApp)

        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Appeal : <?php echo $appeal?></p>
                <p>Name : <?php echo "$name"?></p>
                <p>Address : <?php echo $rowApp['applicantAddress'];?></p>
                <p>Household Income : <?php echo $rowApp['householdIncome'];?></p>
            </div>
            <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

            <div class="input-group mb-3">
            <input type="date" id="date" name="date" class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">RM</span>
                </div>
                <input type="text" class="form-control" id="cashAmount" name="cashAmount" aria-label="Amount" placeholder="1000.00" required>
            </div>
            </div>

            <div class="form-group">
                <textarea class="form-control" id="goods" name="goods" rows="3" placeholder="Rice, Milk Powder .."></textarea>
            </div>
            <br>
            <br>

            <button type="submit" name="btn_logic" id="btn_logic" class="col-12 btn btn-secondary btn-lg btn-block" style="background-color:#507daf ;">Disbursed</button>

            </form>
            </div>
        </div>
        </div>
    <script>
   var res = "success";
</script>
<?php
   echo "<script>document.writeln(res);</script>";
?>

    <script>
    $(document).ready(function(){

    // code to read selected table row cell data (values).
    $("#ann").on('click','.btnSelect',function(){
     // get the current row
     var currentRow=$(this).closest("tr"); 
     var uname=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
     var appealID = document.getElementById("appealID").value;
     createCookie("uname", uname, "1");
     createCookie("app", appealID, "1");
    });
    });

    function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }

    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
    }

    </script>


    </body>
</html>





