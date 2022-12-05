<?php

namespace App\Classes;

use PDO;
use PDOException;

class Matche extends Connection
{
    // property's
    private int $id, $first_team_id, $second_team_id, $stadium_id;
    private float $ticket_price;
    private string $date_match, $description;

    // setters
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setFirstTeamId($first_team_id): void
    {
        $this->first_team_id = $first_team_id;
    }

    public function setSecondTeamId($second_team_id): void
    {
        $this->second_team_id = $second_team_id;
    }

    public function setStadiumId($stadium_id): void
    {
        $this->stadium_id = $stadium_id;
    }

    public function setTicketPrice($ticket_price): void
    {
        $this->ticket_price = $ticket_price;
    }

    public function setDateMatch($date_match): void
    {
        $this->date_match = $date_match;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    // methods crud
    public function read(): bool|array
    {
        try {
            $sql = "SELECT * FROM matchs";
            $stmt = $this->connect()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "ERROR: Could not prepare/execute query: $sql. " . $e->getMessage();
            return false;
        }
    }

    public function getSpecific(): bool|array
    {
        try {
            $sql = "SELECT * FROM matchs WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "ERROR: Could not prepare/execute query: $sql. " . $e->getMessage();
            return false;
        }
    }

    public function add(): bool
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

    public function update(): bool
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

    public function delete(): bool
    {
        try {
            $sql = "DELETE FROM matchs WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

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