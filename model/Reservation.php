<?php

namespace App\Classes;

use PDO;
use PDOException;

class Reservation extends Connection
{
    // property's
    private int $id, $spectator_id, $match_id, $quantity;
    private string $date_reservation;

    // setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setSpectatorId(int $spectator_id): void
    {
        $this->spectator_id = $spectator_id;
    }

    public function setMatchId(int $match_id): void
    {
        $this->match_id = $match_id;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setDateReservation(string $date_reservation): void
    {
        $this->date_reservation = $date_reservation;
    }

    // methods
    public function read(): bool|array
    {
        try {
            $sql = "SELECT * FROM reservations";
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
            $sql = "SELECT * FROM reservations WHERE spectator_id = :spectator_id";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':spectator_id', $this->spectator_id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "ERROR: Could not prepare/execute query: $sql. " . $e->getMessage();
            return false;
        }
    }

    public function reserve(): bool
    {
        try {
            $sql = "INSERT INTO reservations VALUES (NULL, :spectator_id, :match_id, :quantity, :date_reservation)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':spectator_id', $this->spectator_id, PDO::PARAM_INT);
            $stmt->bindParam(':match_id', $this->match_id, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
            $stmt->bindParam(':date_reservation', $this->date_reservation);

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
            $sql = "DELETE FROM reservations WHERE id = :id";
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