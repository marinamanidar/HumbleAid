<?php 

include("connection.php");
session_start();

if (isset($_POST['add1'])){
    $id = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $sub = str_shuffle($id);
    $contributionID = substr($sub,0,5);
    $description = $_POST['description'];
    $estimatedValue = $_POST['estimatedValue'];
    $appealID = $_POST['appealID'];
    $today = date("Y-m-d");

    $query1 = "INSERT INTO `goods`(`contributionID`, `receiveDate`, `appealID`, `description`, `estimatedValue`) VALUES ('$contributionID', '$today', '$appealID', '$description', '$estimatedValue')";
    $save1 = mysqli_query($conn, $query1);

    echo "<script> alert('Contribution Goods Save') </script>";
}

?>