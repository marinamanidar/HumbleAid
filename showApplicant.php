<?php
    session_start();
    include("connection.php");

    if(isset($_POST['clicked'])){
        $username = $_POST['clicked'];
        $k = $_POST['appeal'][$_POST['clicked']];

        echo "<script>setTimeout(\"location.href = 'disbursement.php';\",1500);</script>";
    }

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
            <form method="POST" action="disbursement.php">
                <table>
                <thead>
                    <th>Applicants</th>
                    <th></th>
                </thead>
                    <tbody>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>

<?php
    $i = 1;
    while($row = mysqli_fetch_array($res)){
?>
    <tr>
        <td>
        <input style="border: 0;" type="text" value="<?=$row['username']?>" name="username[<?=$row['IDno']?>" readonly>
        </td>

        <input style="visibility: hidden;" type="text" value="<?=$k?>" name="appeal[<?=$row['IDno']?>" readonly>

        <td><button type="submit" name="clicked" value="<?=$row['username']?>">Disburse</button></td>
    </tr>
    </tbody>
<?php $i++;}
    }else{
        echo "<br>";
    }
?>

    


