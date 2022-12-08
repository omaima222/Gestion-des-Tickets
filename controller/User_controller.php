<?php

require '../model/User.php';

use App\Classes\User;




if(isset($_POST["signup"]))  Signup();
if(isset($_POST["login"]))  Login();
if(isset($_POST["update"]))  Update();
if(isset($_GET["updateId"]))  Display();
if(isset($_GET["deleteAcc"]))  Delete();
if(isset($_GET["logout"]))  Logout();





function Signup(){
    $user = new User();
    $user->signup();
} 

function Login(){
    $user = new User();
    
    $result = $user->login();
    if($result){
        $_SESSION['userId']=$result['id'];
        header("Location:../pages/landingPage.php");
        // var_dump($result['id']);

    }else{
        $_SESSION['errorlogin']="incorrect inputs";
        header("Location:../pages/login.php");
    }
} 

function Logout(){

    $user = new User();
    if(isset($_SESSION['userId'])){
       $user->logout();
       var_dump($user);
    }
}

function Update(){
    $user = new User();
    $user->update();

} 

function Display(){
    $user = new User();
    return $user->display($_SESSION['userId']);
}

function Delete(){
    $user = new User();
    $user->delete($_SESSION['userId']);
}



?>
