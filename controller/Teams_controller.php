<?php

require 'shared.php';
require '../model/Connection.php';
require '../model/Teams.php';

use App\Classes\Teams;

if (isset($_POST['save_team'])) save_team();
if (isset($_POST['delete_team'])) delete_stadium($_POST['delete_team']);

function save_team(): void
{
    $name = validate_input("{$_POST['team-name']}", 'text');
    $logo = validate_input("{$_POST["team-logo"]}", 'select');
    $image = validate_input("{$_POST["team-image"]}", 'text');
    $groupe = validate_input("{$_POST["team-groupe"]}", 'selectAlphabet');

    if ($name == 'null' || $logo == 'null' || $image == 'null' || $groupe == 'null') {
        $_SESSION['message'] = "Invalid inputs When Add team !";
        header('location: ../pages/dashboard.php');
        die;
    }

    $team = new Teams();
    $team->setId($id);
    $team->setName($name);
    $team->setLogo($logo);
    $team->setImage($image);
    $team->setGroupe($groupe);

    if ($team->add()) {
        $_SESSION['message'] = "Team has been added successfully !";
    } else {
        $_SESSION['message'] = "Error when add team !";
    }
    header('location: ../pages/dashboard.php');
}


function delete_team($id): void
{
    $team = new Teams();
    $team->setId($id);
    if ($team->delete()) {
        $_SESSION['message'] = "Team has been deleted successfully !";
    } else {
        $_SESSION['message'] = "Error when delete team !";
    }
    header('location: ../pages/dashboard.php');
}