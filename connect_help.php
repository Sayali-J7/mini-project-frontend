<?php
$email = $_POST['email'];
$comment = $_POST['comment'];

//database connection

$conn = mysqli_connect('localhost','root','','help');

if (isset($_POST['sub_q'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);


    if($conn->connect_error){
        die('Connection failed:' .$conn->connect_error);
    }
    else{

        $sql = "INSERT INTO queries ( email, comment) VALUES ( '$email' , '$comment')";
        mysqli_query($conn,$sql);
        $_SESSION['email'] = $email;
        header('location: help.html');
        $sql->close();
        $conn->close();
    }

}
?>