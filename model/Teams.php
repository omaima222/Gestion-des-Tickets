<?php

namespace App\classes;

use PDO;
use PDOException;

class Teams extends Connection{
    private $id;
    private $name;
    private $logo;
    private $image;
    private $groupe;

    function __construct($id,$name,$logo,$image,$groupe){
        $this-> id      = $id;
        $this-> name    = $name;
        $this-> logo    = $logo;
        $this-> image   = $image;
        $this-> groupe  = $groupe;
    }

    function read() :  void{
        $this-> connect();
    }

    function add(): bool
    {
        try {
            $sql = "INSERT INTO team VALUES (NULL, :name, :logo, :image, :groupe)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':logo', $this->logo);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':groupe', $this->groupe, PDO::PARAM_INT);

            $stmt->execute();

            // Close statement
            unset($stmt);

            return true;
        } catch (PDOException $e) {
            echo "ERROR: Could not prepare/execute query: $sql. " . $e->getMessage();
            return false;
        }
    }
}

?>