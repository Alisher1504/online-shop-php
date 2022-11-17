<?php
session_start();
require('../config/dbcon.php');


if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);



    $db = "SELECT email FROM users WHERE email='$email'";
    $res = mysqli_query($con, $db);

    if(mysqli_num_rows($res) > 0){
        $_SESSION['message'] = "bunday email mavjud";
        header('Location: ../register.php');
    }
    else{
        if($password == $confirm_password){

            $sql = "INSERT INTO users (name, email, phone, password) VALUE('$name', '$email', '$phone', '$password')";
            $result = mysqli_query($con, $sql);
    
            if($result) {
                $_SESSION['message'] = "register successfully";
                header('Location: ../login.php');
            } else{
                $_SESSION['message'] = "plaes register";
                header('Location: ../register.php');
            }
    
        }
        else{
            $_SESSION['message'] = "parrollar birxil bolishi kerak";
            header('Location: ../register.php'); 
        }
    }


} 

else if(isset($_POST['submit_login'])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $my_login_db = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $my_login_res = mysqli_query($con, $my_login_db);

    if(mysqli_num_rows($my_login_res) > 0){

        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($my_login_res);
        $username = $userdata['name'];
        $useremail = $userdata['email'];

        $_SESSION['auth_users'] = [
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['message'] = "logged in successfully";
        header('Location: ../index.php');

    }
    else{

        $_SESSION['message'] = "loged in pleas";
        header('Location: ../login.php');

    }


}















?>