<?php
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
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                View Applicants
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table>
                <thead>
                    <th>Username</th>
                    <th></th>
                </thead>
                    <tbody>

<?php
    while($row = mysqli_fetch_array($res)){
        $id = $row['IDno'];
?>
    <tr>
        <td><?php echo $row['username'];?></td>
        <td><button type="button" class="btnSelect" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Contribute
        </button></td>
    </tr>
    </tbody>
    
<?php
    }
    }else{
        echo "<br>";
    }
?>

