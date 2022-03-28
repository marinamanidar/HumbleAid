<?php
    include("connection.php");

    $k = $_POST['id'];
    $k = trim($k);
    $sql = "Select * from cashdonation where appealID= '{$k}'";
    $res = mysqli_query($conn,$sql);

    if($res -> num_rows > 0){
?>
    <thead>
        <th>Amount</th>
        <th>Payment Channel</th>
        <th>Reference No</th>
    </thead>
        <tbody>

<?php
    while($row = mysqli_fetch_array($res)){
?>
    <tr>
        <td><?php echo $row['amount'];?></td>
        <td><?php echo $row['paymentChannel'];?></td>
        <td><?php echo $row['referenceNo'];?></td>
    </tr>
    </tbody>
    
<?php
    }

    }else{
        echo "<br>";
    }
?>