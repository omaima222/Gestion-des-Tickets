<?php

namespace App\Classes;

use PDO;
use PDOException;

class Matche extends Connection
{
    private $id,
        $first_team_id,
        $second_team_id,
        $stadium_id,
        $ticket_price,
        $date_match,
        $description;

    function __CONSTRUCT($id, $first_team_id, $second_team_id, $stadium_id, $ticket_price, $date_match, $description)
    {
        $this->id = $id;
        $this->first_team_id = $first_team_id;
        $this->second_team_id = $second_team_id;
        $this->stadium_id = $stadium_id;
        $this->ticket_price = $ticket_price;
        $this->date_match = $date_match;
        $this->description = $description;
    }

    function read(): void
    {
        $this->connect();
    }

    function add(): bool
    {
        try {
            $sql = "INSERT INTO matchs VALUES (NULL, :first_team_id, :second_team_id, :stadium_id, :ticket_price, :date_match, :description)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':first_team_id', $this->first_team_id, PDO::PARAM_INT);
            $stmt->bindParam(':second_team_id', $this->second_team_id, PDO::PARAM_INT);
            $stmt->bindParam(':stadium_id', $this->stadium_id, PDO::PARAM_INT);
            $stmt->bindParam(':ticket_price', $this->ticket_price);
            $stmt->bindParam(':date_match', $this->date_match);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);

            $stmt->execute();

            // Close statement
            unset($stmt);

            return true;
        } catch (PDOException $e) {
            echo "ERROR: Could not prepare/execute query: $sql. " . $e->getMessage();
            return false;
        }
    }

    function update(): bool
    {
        try {
            $sql = "UPDATE matchs SET `team1_id`=?,`team2_id`=?,`stadium_id`=?,`ticket_price`=?,`date`=?,`description`=? WHERE `id`=?";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindValue(1, $this->first_team_id, PDO::PARAM_INT);
            $stmt->bindValue(2, $this->second_team_id, PDO::PARAM_INT);
            $stmt->bindValue(3, $this->stadium_id, PDO::PARAM_INT);
            $stmt->bindValue(4, $this->ticket_price);
            $stmt->bindValue(5, $this->date_match);
            $stmt->bindValue(6, $this->description, PDO::PARAM_STR);
            $stmt->bindValue(7, $this->description, PDO::PARAM_INT);

            $stmt->execute();

            // Close statement
            unset($stmt);

            return true;
        } catch (PDOException $e) {
            echo "ERROR: Could not prepare/execute query: $sql. " . $e->getMessage();
            return false;
        }
    }

    function delete($id): void
    {
        // TODO: Implement delete() method.
    }
}