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
        <th>Goods</th>
        <th></th>
    </thead>
        <tbody>
    <tr>
        <th>Description</th>
        <th>Estimated Value</th>
    </tr>
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

    }else{
        echo "<br>";
    }
?>