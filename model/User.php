<?php

namespace App\Classes;

use PDO;
use PDOException;




class User extends Connection
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $image;
    protected $is_admin;



    public function signup(){

    
        $first_name = $_POST["SfirstName"];
        $last_name  = $_POST["SlastName"];
        $email      = $_POST["Semail"];
        $password   = $_POST["Spassword"];
        $pic        =$_FILES['pfp']['name'];
        $image      =$_FILES['pfp']['tmp_name'];
    
    
        $stmt = $this->connect()->prepare("INSERT INTO user VALUES ( ?,?,?,?,?,?,? )");
        $stmt->execute([NULL,$first_name,$last_name,$email,$password,1,$pic]);
        move_uploaded_file($image, '../assets/images/users pfp/'.$pic);

     

    }

    public function login(){


        $email      = $_POST["email"];
        $password   = $_POST["password"];
    
        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE email=? AND password=?");
        $stmt->execute([$email,$password]);
        $user = $stmt->fetch();

        return $user;
    }
    
    public function update(){

        $first_name = $_POST["firstName"];
        $last_name  = $_POST["lastName"];
        $email      = $_POST["email"];
        $password   = $_POST["password"];
        $id         = $_POST["userId"]; 
        $pic        =$_FILES['pfp']['name'];
        $image      =$_FILES['pfp']['tmp_name'];

        $stmt = $this->connect()->prepare("UPDATE user SET first_name= ? , last_name= ? , email= ? ,
        password=? ,image=?   WHERE id='$id' ");
        $stmt->execute([$first_name,$last_name,$email,$password,$pic]);
        move_uploaded_file($image, '../assets/images/users pfp/'.$pic);

    }

    
    public function delete(){
        $id   = $_POST["deleteAcc"]; 
        $stmt = $this->connect()->prepare("DELETE FROM user WHERE id=?");
        $stmt->execute([$id]);
    } 

    public function display( $id ){

  

        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE id=? ");
        $stmt->execute([$id]);
        $users = $stmt->fetch();

        return  $users;
     
    } 

    
    
    
}



?>