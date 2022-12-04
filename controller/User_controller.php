<?php

require '../model/Connection.php';
require '../model/User.php';

use App\Classes\User;

session_start();



if(isset($_POST["signup"]))  Signup();
if(isset($_POST["login"]))  Login();


function Signup() {
    $user = new User();
    $user->signup();
} 

function Login() {

    $user = new User();

    if($user->login()){
        header("Location:../pages/landingPage.php");
    }else{
        $_SESSION['errorlogin']="incorrect inputs";
        header("Location:../pages/login.php");
    }
} 




?>
