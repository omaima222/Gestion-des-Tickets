<?php

namespace App\Classes;

use PDO;
use PDOException;

class Matche extends Connection
{
    // property's
    private int $id, $first_team_id, $second_team_id, $stadium_id;
    private float $ticket_price;
    private string $date_match, $description, $image;

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

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    // methods crud
    public function read(): bool|array
    {
        try {
            $sql = "SELECT m.id,t.name AS n_t1, t2.name AS n_t2, m.ticket_price, s.name n_s, m.date, m.description, m.image
                    FROM matchs AS m
                    INNER JOIN team AS t ON m.team1_id = t.id 
                    INNER JOIN team AS t2 ON m.team2_id = t2.id
                    INNER JOIN stadium AS s ON m.stadium_id = s.id";
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

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "ERROR: Could not prepare/execute query: $sql. " . $e->getMessage();
            return false;
        }
    }

    public function add(): bool
    {
        try {
            $sql = "INSERT INTO matchs VALUES (NULL, :first_team_id, :second_team_id, :stadium_id, :ticket_price, :date_match, :description, :image)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':first_team_id', $this->first_team_id, PDO::PARAM_INT);
            $stmt->bindParam(':second_team_id', $this->second_team_id, PDO::PARAM_INT);
            $stmt->bindParam(':stadium_id', $this->stadium_id, PDO::PARAM_INT);
            $stmt->bindParam(':ticket_price', $this->ticket_price);
            $stmt->bindParam(':date_match', $this->date_match);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);

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
            if ($this->image == '') {
                $sql = "UPDATE matchs SET `team1_id`=:first_team_id,`team2_id`=:second_team_id,`stadium_id`=:stadium_id,`ticket_price`=:ticket_price,`date`=:date_match,`description`=:description WHERE `id`=:id";
                $stmt = $this->connect()->prepare($sql);
            } else {
                $sql = "UPDATE matchs SET `team1_id`=:first_team_id,`team2_id`=:second_team_id,`stadium_id`=:stadium_id,`ticket_price`=:ticket_price,`date`=:date_match,`description`=:description,`image`=:image WHERE `id`=:id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
            }

            $stmt->bindParam(':first_team_id', $this->first_team_id, PDO::PARAM_INT);
            $stmt->bindParam(':second_team_id', $this->second_team_id, PDO::PARAM_INT);
            $stmt->bindParam(':stadium_id', $this->stadium_id, PDO::PARAM_INT);
            $stmt->bindParam(':ticket_price', $this->ticket_price);
            $stmt->bindParam(':date_match', $this->date_match);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

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