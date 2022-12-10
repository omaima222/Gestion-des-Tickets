<?php

namespace App\classes;

use PDO;
use PDOException;

class Stadiums extends Connection{


    //Les propriétés ----------------
    private $id;
    private $name;
    private $capacity;
    private $address;
    private $image;
    

    //Les setters ----------------
    public function setId($id): void{
        $this->id = $id;
    }
    
    public function setName($name): void{
        $this->name = $name;
    }

    public function setCapacity($capacity): void{
        $this->capacity = $capacity;
    }

    public function setAddress($address): void{
        $this->address = $address;
    }

    public function setImage($image): void{
        $this->image = $image;
    }


    //Méthode d'affichage ----------------
    function read($condition = '') : bool|array{
        try{
            $sql = "SELECT * FROM stadium $condition";
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
            $sql = "INSERT INTO stadium VALUES (NULL, :name, :capacity, :address, :image)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':capacity', $this->capacity, PDO::PARAM_STR);
            $stmt->bindParam(':address', $this->address, PDO::PARAM_STR);
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);

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
            $sql = "DELETE FROM stadium WHERE id = :id";
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