<?php 

include("connection.php");

if (isset($_POST['add2'])){

    $amount = $_POST['cash'];
    $paymentChannel = $_POST['paymentChannel'];
    $referenceNo = $_POST['referenceNo'];
    $appealID = $_POST['appealID'];
    $today = date("Y-m-d");
    $description = "-";

    $query2 = "INSERT INTO `contribution`(`contributionID`, `receiveDate`, `appealID`, `description`, `referenceNo`) VALUES ('contributionID', '$today', '$appealID', '$description', '$referenceNo')";
    $save2 = mysqli_query($conn, $query2);

    $appid = "SELECT `contributionID` FROM `contribution` WHERE referenceNo = '$referenceNo'";
    $appI = $conn->query($appid);
    $appDD = $appI->fetch_assoc();
    $appIDD = $appDD['contributionID'];

    $query1 = "INSERT INTO `cashdonation`(`contributionID`, `amount`, `paymentChannel`, `referenceNo`) VALUES ('$appIDD', '$amount', '$paymentChannel', '$referenceNo')";
    $save1 = mysqli_query($conn, $query1);

    echo "<script> alert('Contribution Cash Save') </script>";
    header("recordCon.php");
}
?>