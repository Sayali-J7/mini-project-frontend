<?php

$owner_name = $_POST['owner_name'];
$plate_no = $_POST['plate_no'];
$color = $_POST['color'];
$size = $_POST['size'];
//database connection



$conn = mysqli_connect('localhost','root','','vehicle_register');
if($conn->connect_error){
    die('Connection failed:' .$conn->connect_error);
}
else{

    $stmt = $conn->prepare("insert into registered_vehicle(owner_name,plate_no,color,size) values(?,?,?,?)");

    $stmt->bind_param('ssss',$owner_name, $plate_no, $color, $size);
    $stmt->execute();
    echo "registration successful";
    header('location: reg_vehicle.html');
    $stmt->close();
    $conn->close();
}
?>