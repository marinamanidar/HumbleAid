<?php 

include("connection.php");
session_start();

if (isset($_POST['add1'])){

    $description = $_POST['description'];
    $estimatedValue = $_POST['estimatedValue'];
    $appealID = $_POST['appealID'];
    $today = date("Y-m-d");
    $referenceNo = "-";

    $query = "INSERT INTO `contribution`(`contributionID`, `receiveDate`, `appealID`, `description`, `referenceNo`) VALUES ('contributionID', '$today', '$appealID', '$description', '$referenceNo')";
    $save = mysqli_query($conn, $query);

    $appid = "SELECT `contributionID` FROM `contribution` WHERE description = '$description'";
    $appI = $conn->query($appid);
    $appDD = $appI->fetch_assoc();
    $appIDD = $appDD['contributionID'];

    $query1 = "INSERT INTO `goods`(`contributionID`, `description`, `estimatedValue`) VALUES ('$appIDD', '$description', '$estimatedValue')";
    $save1 = mysqli_query($conn, $query1);

    echo "<script> alert('Contribution Goods Save') </script>";
}

?>