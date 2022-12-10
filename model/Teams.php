<?php

namespace App\classes;

use PDO;
use PDOException;

class Teams extends Connection{


    //Les propriétés ----------------
    private $id;
    private $name;
    private $logo;
    private $image;
    private $groupe;
 
    
    //Les setters ----------------
    public function setId($id): void{
        $this->id = $id;
    }
    
    public function setName($name): void{
        $this->name = $name;
    }

    public function setLogo($logo): void{
        $this->logo = $logo;
    }

    public function setImage($image): void{
        $this->image = $image;
    }

    public function setGroupe($groupe): void{
        $this->groupe = $groupe;
    }


    //Méthode d'affichage ----------------
    function read($condition = '') : bool|array{
        try{
            $sql = "SELECT * FROM team $condition";
            $stmt = $this->connect()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        }catch (PDOException $e){
            echo    $e->getMessage();
            return false;
        }
    }


    //Méthode d'ajout ----------------
    function add(): bool{
        try{
            $sql = "INSERT INTO team VALUES (NULL, :name, :logo, :image, :groupe)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':logo', $this->logo, PDO::PARAM_STR);
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
            $stmt->bindParam(':groupe', $this->groupe, PDO::PARAM_STR);

            $stmt->execute();

            // Close statement
            unset($stmt);

            return true;

        }catch (PDOException $e) {
            echo    $e->getMessage();
            return false;
        }
    }

    
    //Méthode de suppression ----------------
    function delete(): bool{
        try{
            $sql = "DELETE FROM team WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

            $stmt->execute();

            // Close statement
            unset($stmt);

            return true;
            
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>