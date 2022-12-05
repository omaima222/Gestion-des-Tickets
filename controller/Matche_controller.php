<?php
session_start();

require 'shared.php';
require '../model/Connection.php';
require '../model/Matche.php';

use App\Classes\Matche;

if (isset($_POST['save_match'])) save_match();
if (isset($_POST['update_match'])) update_match();


function save_match(): void
{
    $first_team_id = validate_input("{$_POST['match-first-team']}", 'select');
    $second_team_id = validate_input("{$_POST["match-second-team"]}", 'select');
    $stadium_id = validate_input("{$_POST["match-stadium"]}", 'select');
    $ticket_price = validate_input("{$_POST["match-ticket-price"]}", 'price');
    $date_match = $_POST["match-date"];
    $description = validate_input("{$_POST["match-description"]}", 'text');

    if ($first_team_id == 'null' || $second_team_id == 'null' || $stadium_id == 'null' || $ticket_price == 'null' || $date_match == 'null' || $description == 'null') {
        $_SESSION['message'] = "Invalid inputs When Add Match !";
        header('location: ../pages/dashboard.php');
        die;
    }

    $match = new Matche(
        "",
        "$first_team_id",
        "$second_team_id",
        "$stadium_id",
        "$ticket_price",
        "$date_match",
        "$description"
    );

    if ($match->add()) {
        $_SESSION['message'] = "Match has been added successfully !";
    } else {
        $_SESSION['message'] = "Error when add Match !";
    }
    header('location: ../pages/dashboard.php');
}

function update_match(): void
{
    $id = validate_input("{$_POST['match-id']}", 'select');
    $first_team_id = validate_input("{$_POST['match-first-team']}", 'select');
    $second_team_id = validate_input("{$_POST["match-second-team"]}", 'select');
    $stadium_id = validate_input("{$_POST["match-stadium"]}", 'select');
    $ticket_price = validate_input("{$_POST["match-ticket-price"]}", 'price');
    $date_match = $_POST["match-date"];
    $description = validate_input("{$_POST["match-description"]}", 'text');

    if ($id == 'null' || $first_team_id == 'null' || $second_team_id == 'null' || $stadium_id == 'null' || $ticket_price == 'null' || $date_match == 'null' || $description == 'null') {
        $_SESSION['message'] = "Invalid inputs When Add Match !";
        header('location: ../pages/dashboard.php');
        die;
    }

    $match = new Matche(
        "$id",
        "$first_team_id",
        "$second_team_id",
        "$stadium_id",
        "$ticket_price",
        "$date_match",
        "$description"
    );

    if ($match->update()) {
        $_SESSION['message'] = "Match has been updated successfully !";
    } else {
        $_SESSION['message'] = "Error when update Match !";
    }
    header('location: ../pages/dashboard.php');
}