<?php 

include("connection.php");

if (isset($_POST['add2'])){
    $id = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $sub = str_shuffle($id);
    $contributionID = substr($sub,0,5);
    $amount = $_POST['cash'];
    $paymentChannel = $_POST['paymentChannel'];
    $referenceNo = $_POST['referenceNo'];
    $appealID = $_POST['appealID'];
    $today = date("Y-m-d");

    $query1 = "INSERT INTO `cashdonation`(`contributionID`, `receiveDate`, `appealID`, `amount`, `paymentChannel`, `referenceNo`) VALUES ('$contributionID', '$today', '$appealID', '$amount', '$paymentChannel', '$referenceNo')";
    $save1 = mysqli_query($conn, $query1);

    echo "<script> alert('Contribution Cash Save') </script>";
    header("recordCon.php");
}
?>