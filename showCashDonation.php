<?php
    include("connection.php");

    $k = $_POST['id'];
    $k = trim($k);
    $sqlC = "Select * from cashdonation where appealID= '{$k}'";
    $resC = mysqli_query($conn,$sqlC);

    if($resC -> num_rows > 0){
?>
    <thead>
        <th>Amount</th>
        <th>Payment Channel</th>
        <th>Reference No</th>
    </thead>
        <tbody>

<?php
    while($rowC = mysqli_fetch_array($resC)){
?>
    <tr>
        <td><?php echo $rowC['amount'];?></td>
        <td><?php echo $rowC['paymentChannel'];?></td>
        <td><?php echo $rowC['referenceNo'];?></td>
    </tr>
    </tbody>
    
<?php
    }

    }else{
        echo "<br>";
    }
?>