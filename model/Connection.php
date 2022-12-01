<?php

namespace App\Classes;

use PDO;
use PDOException;

abstract class Connection
{
    private string $localhost = "localhost";
    private string $username = "root";
    private string $db_password = "";
    private string $db_name = "gestion_des_tickets";

    protected function connect(): void
    {
        try {
            $conn = new PDO("mysql:host=$this->localhost;dbname=$this->db_name", $this->username, $this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}