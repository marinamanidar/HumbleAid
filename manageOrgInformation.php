<?php

$server = "localhost";
$user   = "root";
$pass   = "";
$name   = "humbleaid";

$connect = mysqli_connect($server, $user, $pass, $name);

if(isset($_POST['submit'])){
    $orgID = $_POST['organization'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $jobtitle = $_POST['jobtitle'];

    //genarate password
    $password = "abcdefghijklmnopqrstuvwxyz0123456789#$&_";
    $password = str_shuffle($password);
    $passwords = substr($password,0,8);

    //email validate from mysqli
    $check_email = "SELECT email FROM user WHERE email = '$email' ";
    $check = mysqli_query($connect, $check_email);

    //username validate from mysqli
    $check_username = "SELECT username FROM user WHERE username = '$username'";
    $check1 = mysqli_query($connect, $check_username);

    if(mysqli_num_rows($check) > 0){
        echo "<script> alert('Email already exist') </script>";
    }
    else if(mysqli_num_rows($check1) > 0){
        echo "<script> alert('Username already exist') </script>";
    }
    else{
        $query = "INSERT INTO `user`(`username`, `password`, `fullname`, `email`, `mobileNo`) VALUES ('$username', '$passwords', '$fullname', '$email', '$mobile')";
        $save = mysqli_query($connect, $query);

        $query2 = "INSERT INTO `organizationrepresentative`(`username`, `jobTitle`, `orgID`) VALUES ('$username', '$jobtitle', '$orgID')";
        $save2 = mysqli_query($connect, $query2);

        echo "<script> alert('Organization Representative Save') </script>";
    }

}

?>