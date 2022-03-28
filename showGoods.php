<?php
    include("connection.php");

    $k = $_POST['id'];
    $k = trim($k);
    $sql = "Select * from goods where appealID= '{$k}'";
    $res = mysqli_query($conn,$sql);
    $sqlC = "Select * from cashdonation where appealID= '{$k}'";
    $resC = mysqli_query($conn,$sqlC);

    if($res -> num_rows > 0){
?>

    <thead>
        <th>Description</th>
        <th>Estimated Value</th>
    </thead>
        <tbody>

<?php
    while($row = mysqli_fetch_array($res)){
?>
    <tr>
        <td><?php echo $row['description'];?></td>
        <td><?php echo $row['estimatedValue'];?></td>
    </tr>
    </tbody>
    
<?php
    }

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
        
            }


    }else{
        echo "<br>";
    }
?>