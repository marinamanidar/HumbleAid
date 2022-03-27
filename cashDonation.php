<?php 

include("connection.php");
session_start();

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
            <div class="table-responsive dt-responsive">
                <table class="table table-dark text-center">
                    <thead>
                        <th>Appeal ID</th>
                        <th>Description</th>
                        <th>Organization ID</th>
                        <th>View</th>
                        <th>Select</th>
                    </thead>
                    <tbody>
                        <!--to show all the appeal in same org ID-->
                        <?php
                            $appeal = "SELECT * FROM `appeal`";
                            $appeals = mysqli_query($conn, $appeal);
                            while($appealA = mysqli_fetch_array($appeals)){
                                echo "<tr>
                                <td>$appealA[appealID]</td>
                                <td>$appealA[description]</td>
                                <td>$appealA[orgID]</td>
                                <td><a href='cashContribution.php?appealID=$appealA[appealID]'><button type='button' class='btn btn-primary'>View</button></a></td>
                                <td><a href='cashContribution.php?appealID=$appealA[appealID]'><button type='button' class='btn btn-primary'>Select</button></a></td>  
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
</html>

