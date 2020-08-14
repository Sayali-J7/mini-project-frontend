<?php
//connect to the database
$username = $_POST['username'];
$email = isset($_POST['email']) ? $_POST['email'] : '';
//$email = $_POST['email'];
$password = $_POST['password'];
$errors = array();

//database connection

$conn = mysqli_connect('localhost','root','','register');

//if register button is clicked
if (isset($_POST['reg_user'])){

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

//check duplicates of username

    $check_duplicate_username = "SELECT username FROM registration WHERE username = '$username' ";

    $results = mysqli_query($conn,$check_duplicate_username);
    $count = mysqli_num_rows($results);
    if($count > 0){

        echo"Username already taken.";
        return false;

    }

//check is username is empty
    if($username == '' || empty($username)){

    echo"Username cannot be blank";
    return false;

    }

//check if email id is valid or not
    if(strpos($email,'@')==false || strpos($email,'.')==false){

    echo"Please use valid email-id!";
    return false;
    }

//to check duplicate of email id
    $check_duplicate_email = "SELECT email FROM registration WHERE email = '$email' ";

    $ans = mysqli_query($conn,$check_duplicate_email);
    $no = mysqli_num_rows($ans);
    if($no > 0){

        echo"Use different email-id";
        return false;

    }

//check is email field is empty
    if($email == '' || empty($email)){

    echo"Email-id cannot be blank";
    return false;

    }


//final
    if($conn->connect_error){
        die('Connection failed:' .$conn->connect_error);
    }
    else{
        $password = md5($password);
        $sql = "INSERT INTO registration (username, email, password) VALUES ('$username', '$email' , '$password')";
        mysqli_query($conn,$sql);
        $_SESSION['username'] = $username;
        header('location: reg_vehicle.html');
        $sql->close();
        $conn->close();
    }

}

$conn = mysqli_connect('localhost','root','','register');

$username = $_POST['username'];
$password = $_POST['password'];
$errors = array();

//log user in from login page
if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);


    if($conn->connect_error){

    die('Connection failed:' .$conn->connect_error);

    }
    else{

        $password = md5($password);
        $query = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'  ";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) == 1){

            //log user in
            $_SESSION['username'] = $username;
            header('location: reg_vehicle.html');
            $sql->close();
            $conn->close();
        }
        else{

            array_push($errors,"wrong user name or password");
            header('location:login.html');

        }

    }

}

?>