<?php

namespace App\Classes;

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

    function add($first_team_id, $second_team_id, $stadium_id, $ticket_price, $date_match, $description): void
    {
        // TODO: Implement add() method.
    }

    function update($id, $first_team_id, $second_team_id, $stadium_id, $ticket_price, $date_match, $description): void
    {
        // TODO: Implement update() method.
    }

    function delete($id): void
    {
        // TODO: Implement delete() method.
    }
}