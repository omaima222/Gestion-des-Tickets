<?php

require '../model/Teams.php';

use App\Classes\Teams;

if (isset($_POST['save_team'])) save_team();
if (isset($_POST['delete_team'])) delete_team($_POST['delete_team']);

function get_teams(): bool|array
{
    $team = new Teams();
    return $team->read();
}

function save_team(): void
{
    $name = validate_input("{$_POST['team-name']}", 'text');
    $logo = upload_image($_FILES["team-logo"], 'team');
    $image = upload_image($_FILES["team-image"], 'team');
    $group = validate_input("{$_POST["team-group"]}", 'selectAlphabet');

    if ($name == 'null' || $logo == '' || $image == '' || $group == 'null') {
        $_SESSION['message'] = "Invalid inputs When Add team !";
        header('location: team.php');
        die;
    }

    $team = new Teams();
    $team->setName($name);
    $team->setLogo($logo);
    $team->setImage($image);
    $team->setGroupe($group);

    if ($team->add()) {
        $_SESSION['message'] = "Team has been added successfully !";
    } else {
        $_SESSION['message'] = "Error when add team !";
    }
    header('location: team.php');
}

function delete_team($id): void
{
    $team = new Teams();
    $team->setId($id);
    $arr = $team->read("WHERE id = $id");
    delete_image($arr[0]['logo'], 'team');
    delete_image($arr[0]['image'], 'team');
    if ($team->delete()) {
        $_SESSION['message'] = "Team has been deleted successfully !";
    } else {
        $_SESSION['message'] = "Error when delete team !";
    }
    header('location: team.php');
}