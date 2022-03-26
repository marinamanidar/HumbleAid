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
                    <p style="padding: 0px 50px; text-align:center;"><?php $_SESSION["username"] ?></p>
                    <button class="btn-logout btn-outline-success" type="submit">Log Out</button>
                </form>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar" style="padding-top: 100px;">
            <a class="active" href="organizationDashboard.php">Dashboard</a>
            <a href="#news">Add Applicants</a>
            <a href="#contact">Record Disbursement</a>
            <a href="#about">Organizae Appeal</a>
            <a href="#about">Record Contribution</a>
        </div>

        <div class="content">
            <div class="container">
                
            </div>
        </div>

    </body>
</html>