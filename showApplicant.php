<?php
    session_start();
    include("connection.php");

    $k = $_POST['id'];
    $k = trim($k);
    $sql = "Select orgID from appeal where appealID= '{$k}'";
    $Sql = mysqli_query($conn, $sql);
    $s = mysqli_fetch_assoc($Sql);
    $orgID = $s['orgID'];
    $result = "Select * from applicant where orgID= '$orgID'";
    $res = mysqli_query($conn,$result);

    if($res -> num_rows > 0){
?>
                <table>
                <thead>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Household Income</th>
                    <th></th>
                </thead>
                    <tbody>

<?php
    while($row = mysqli_fetch_array($res)){
        $id = $row['IDno'];
?>
    <tr>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['applicantAddress'];?></td>
        <td><?php echo $row['householdIncome'];?></td>
        <?php
        $_SESSION["applicant"] = $row['username'];
        $_SESSION["applicantAddress"] = $row['applicantAddress'];
        $_SESSION["householdIncome"] = $row['householdIncome'];
        $_SESSION["appealID"] = $k;
        ?>
        <td><a class="btn" href="disbursement.php" role="button">Disburse Aid</a></td>
    </tr>
    </tbody>
<?php
    }
    }else{
        echo "<br>";
    }
?>

    


