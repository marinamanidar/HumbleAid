<?php
    include("connection.php");

    $k = $_POST['id'];
    $k = trim($k);
    //get appeal from date & to date
    $sql = "Select * from appeal where appealID= '{$k}'";
    $res = mysqli_query($conn,$sql);

    if($res -> num_rows > 0){
?>
    <thead>
        <th>From Date</th>
        <th>To Date</th>
    </thead>
        <tbody>
<?php
    while($row = mysqli_fetch_array($res)){
?>
    <tr>
        <td><?php echo $row['fromDate'];?></td>
        <td><?php echo $row['toDate'];?></td>
    </tr>
    </tbody>
<?php
    }

    }else{
        echo "<br>";
    }
?>