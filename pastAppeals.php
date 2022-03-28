<?php
   include("connection.php");
   session_start();
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
<br>
<br>
<br>
<h3 style="text-align: center;">Past Appeals<a class="btn" href="viewAppeal.php" role="button">View Current Appeals</a></h3>
<table id="table" border="1">
        <thead style="background-color: #507daf;">
            <tr class="btn-primary">
                <th>From Date</th>
                <th>To Date</th>
                <th>Description</th>
                <th>Outcome</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $sql = "SELECT * FROM appeal where outcome = 'active' and toDate < CURDATE()";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>

                <td><?php echo $row['fromDate'];?></td>
                <td><?php echo $row['toDate'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['outcome'];?></td>
            </tr>


            <?php }
        ?>
        </tbody>
    </table>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>