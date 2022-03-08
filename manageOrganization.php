<?php 

require_once "manageOrgInformation.php";

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
        <link rel="stylesheet" href="manageOrganization.css">
        
        <!--Javascript-->
        <script>
            function text(){
                var organization = document.getElementById("organization");
                var displayText = organization.options[organization.selectedIndex].value;
                document.getElementById("displayID").value = displayText;
            }
        </script>

    </head>

    <body>
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-light bg-light" style="background-color: #507daf;">
            <div class="container-fluid">
                <a class="navbar-brand">Humble Aid </a>
                <form class="d-flex">
                    <p style="padding: 0px 50px; text-align:center;">John</p>
                    <button class="btn" type="submit"><a href="index.php" class="fw-bold text-body">Log Out</button>
                </form>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar" style="padding-top: 100px;">
            <a href="organizationDashboard.php">Dashboard</a>
            <a class="active" href="manageOrganization.php">Manage Organization</a>
        </div>

        <div class="content">
        <div class="manage">
            <form class="form" method="POST">
                <!--Organization ID-->
                <div class="form-group">
                    <label class="label">Organization ID:</label>
                    <select class="form-control form_data" name="organization" id="organization" onchange="text();">
                        <option selected hidden value="Select Organization ID">Select Organization ID</option>
                        <?php
                            $connect = mysqli_connect("localhost","root","","humbleaid");
                            $query = "SELECT * FROM organization";
                            $data = $connect -> query($query);
                            if($data -> num_rows > 0){
                                while($org = $data -> fetch_assoc()){
                                    $orgName = $org['orgName'];
                                    $orgID = $org['orgID'];
                                    echo "<option value='$orgName'>";
                                    echo "$orgID"; 
                                    echo '</option>';
                                }
                            }
                        ?>
                    </select> 
                        
                    <button type="button" class="btn-modal btn-primary" data-bs-toggle="modal" data-bs-target="#addOrganization">Add new organization</button>
                </div>

                <!--admin page display organization ID-->
                <div class="form-group">
                    <input type="text" class="form-control" name="orgID" id="displayID" disabled>
                </div>
            </from>
        </div>
        <div  class="manages">
            <form class="form" method="POST">
                <h2>Add New Organization Representative</h2>
                <!--admin page username-->
                <div class="form-group">
                    <label class="label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <!--admin page fullname-->
                <div class="form-group">
                    <label class="label">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>

                <!--admin page email-->
                <div class="form-group">
                    <label class="label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <P class="text-danger"><?php if (isset($error['wrongPatientEmail'])) echo $error['wrongPatientEmail']; ?></p>
                </div>

                <!--admin page mobile no-->
                <div class="form-group">
                    <label class="label">Mobile No.</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" required>
                </div>

                <!--admin page job title-->
                <div class="form-group">
                    <label class="label">Job Title</label>
                    <input type="text" class="form-control" id="jobtitle" name="jobtitle" required> 
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
            </form>
        </div>
        </div>

        <!--Model add organization-->
        <div class="modal fade" id="addOrganization" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addOrganizationLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOrganizationLabel">Add New Organization</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="organization.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Organization name :</label>
                                <input type="text" name="organization_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address :</label>
                                <input type="text" name="organizationaddress" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </from>
                </div>
            </div>
        </div>

    </body>
</html>