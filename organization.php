<?php

$server = "localhost";
$user   = "root";
$pass   = "";
$name   = "humbleaid";

$connect = mysqli_connect($server, $user, $pass, $name);

if(isset($_POST['submit'])){
    $organizationname = $_POST['organization_name'];
    $address = $_POST['organizationaddress'];

    $query = "INSERT INTO `organization`(`orgID`, `orgName`, `orgAddress`) VALUES (`orgID`, '$organizationname', '$address')";
    $save = mysqli_query($connect, $query);

    echo '<script type="text/javascript">';
    echo 'alert("Organization has been added.");';
    echo '</script>';
    
   
}
header("Location: manageOrganization.php");
?>

