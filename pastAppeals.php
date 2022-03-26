<?php
   include("connection.php");
   session_start();

   $sql = "SELECT * FROM appeal where outcome = 'expired'";
   $result = mysqli_query($conn,$sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <title>Humble Aid</title>
  </head>
  <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #507daf;
            font-size: xx-large;
        }
  
        td {
            background-color: white;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
  <body>

  <nav class="navbar fixed-top" style="background-color: #507daf;">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:white" >Humble Aid </a>
  </div>
</nav>

    <section style="padding-top: 100px;">
        <!-- TABLE CONSTRUCTION-->
        <h1>Current Appeals <a class="btn" href="viewAppeals.php" role="button">Current Past Appeals</a></h1>
        <div id="app">
        <table>
            <thead>
                <th>Appeal ID</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Description</th>
            </thead>
            <tbody>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows= mysqli_fetch_array($result))
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['appealID'];?></td>
                <td><?php echo $rows['fromDate'];?></td>
                <td><?php echo $rows['toDate'];?></td>
                <td><?php echo $rows['description'];?></td>
            </tr>
            </tbody>
            <?php
                }
             ?>
        </table>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>