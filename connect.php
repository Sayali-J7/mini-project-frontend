<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$errors = array();

//database connection

$conn = mysqli_connect('localhost','root','','register');

if($conn->connect_error){
    die('Connection failed:' .$conn->connect_error);
}
else{

    $stmt = $conn->prepare("insert into registration(username,email,password) values(?,?,?)");
    $stmt->bind_param("sss",$username,$email,$password);
    $stmt->execute();
    echo "registration successful";
    header('location: help.html');
    $stmt->close();
    $conn->close();
}




















?>