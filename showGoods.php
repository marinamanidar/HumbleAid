<?php
    include("connection.php");

    $k = $_POST['id'];
    $k = trim($k);
    $sql = "Select * from goods where appealID= '{$k}'";
    $res = mysqli_query($conn,$sql);

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

    }else{
        echo "<br>";
    }
?>