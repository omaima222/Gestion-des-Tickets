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
    
    
        $stmt = $this->connect()->prepare("INSERT INTO user VALUES ( ?,?,?,?,?,?,? )");
        $stmt->execute([NULL,$first_name,$last_name,$email,$password,1,"image"]);
     

    }

    public function login(){


        $email      = $_POST["email"];
        $password   = $_POST["password"];
    
        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE email=? AND password=?");
        $stmt->execute([$email,$password]);
        $result = count($stmt->fetchAll());
        
        return $result  ;
    }
    
    
    public function delete(){

    } 
    
    
    public function update(){

    }

}



?>