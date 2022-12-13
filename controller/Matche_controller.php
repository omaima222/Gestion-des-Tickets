<?php

require '../model/Matche.php';

use App\Classes\Matche;

if (isset($_POST['save_match'])) save_match();
if (isset($_POST['update_match'])) update_match();
if (isset($_POST['delete_match'])) delete_match($_POST['delete_match']);
if (isset($_POST['specific_match'])) get_specific_match($_POST['specific_match']);

function get_matchs($condition = ''): bool|array
{
    $match = new Matche();
    if (isset($_POST['search'])) {
        $search_match = $_POST['search-match'];
        return $match->searchMatch($search_match);
    } else {
        return $match->read($condition);
    }
}

function get_spec_match($id): bool|array
{
    $match = new Matche();
    return $match->read("WHERE m.id = $id");
}

function save_match(): void
{
    $today = date('Y-m-d h:i:s');

    $first_team_id = validate_input("{$_POST['match-first-team']}", 'select');
    $second_team_id = validate_input("{$_POST["match-second-team"]}", 'select');
    $stadium_id = validate_input("{$_POST["match-stadium"]}", 'select');
    $ticket_price = validate_input("{$_POST["match-ticket-price"]}", 'price');
    $date_match = $_POST["match-date"];
    $description = validate_input("{$_POST["match-description"]}", 'text');
    $image = upload_image($_FILES["match-image"], 'match');

    if ($first_team_id == 'null' || $second_team_id == 'null' || $stadium_id == 'null' || $ticket_price == 'null' || $date_match == 'null' || $description == 'null' || $image == '') {
        $_SESSION['message'] = "Invalid inputs When Add Match !";
        header('location: match.php');
        die;
    }
    if ($date_match < $today) {
        $_SESSION['message'] = "Date invalid When Add Match !";
        header('location: match.php');
        die;
    }
    if ($first_team_id == $second_team_id) {
        $_SESSION['message'] = "Cannot play match with same team !";
        header('location: match.php');
        die;
    }

    $match = new Matche();
    $match->setFirstTeamId($first_team_id);
    $match->setSecondTeamId($second_team_id);
    $match->setStadiumId($stadium_id);
    $match->setTicketPrice($ticket_price);
    $match->setDateMatch($date_match);
    $match->setDescription($description);
    $match->setImage($image);

    if ($match->add()) {
        $_SESSION['message'] = "Match has been added successfully !";
    } else {
        $_SESSION['message'] = "Error when add Match !";
    }
    header('location: match.php');
}

function update_match(): void
{
    $today = date('Y-m-d h:i:s');

    $id = validate_input("{$_POST['match-id']}", 'select');
    $first_team_id = validate_input("{$_POST['match-first-team']}", 'select');
    $second_team_id = validate_input("{$_POST["match-second-team"]}", 'select');
    $stadium_id = validate_input("{$_POST["match-stadium"]}", 'select');
    $ticket_price = validate_input("{$_POST["match-ticket-price"]}", 'price');
    $date_match = $_POST["match-date"];
    $description = validate_input("{$_POST["match-description"]}", 'text');
    $image = upload_image($_FILES["match-image"], 'match');

    if ($id == 'null' || $first_team_id == 'null' || $second_team_id == 'null' || $stadium_id == 'null' || $ticket_price == 'null' || $date_match == 'null' || $description == 'null') {
        $_SESSION['message'] = "Invalid inputs When Add Match !";
        header('location: match.php');
        die;
    }
    if ($date_match < $today) {
        $_SESSION['message'] = "Date invalid When Add Match !";
        header('location: match.php');
        die;
    }
    if ($first_team_id == $second_team_id) {
        $_SESSION['message'] = "Cannot play match with same team !";
        header('location: match.php');
        die;
    }

    $match = new Matche();
    $match->setId($id);
    $match->setFirstTeamId($first_team_id);
    $match->setSecondTeamId($second_team_id);
    $match->setStadiumId($stadium_id);
    $match->setTicketPrice($ticket_price);
    $match->setDateMatch($date_match);
    $match->setDescription($description);
    $match->setImage($image);

    if ($image != '') {
        delete_image($match->getSpecific()['image'], 'match');
    }


    if ($match->update()) {
        $_SESSION['message'] = "Match has been updated successfully !";
    } else {
        $_SESSION['message'] = "Error when update Match !";
    }
    header('location: match.php');
}

function delete_match($id): void
{
    $match = new Matche();
    $match->setId($id);
    delete_image($match->getSpecific()['image'], 'match');
    if ($match->delete()) {
        $_SESSION['message'] = "Match has been deleted successfully !";
    } else {
        $_SESSION['message'] = "Error when delete Match !";
    }
    header('location: match.php');
}

function get_specific_match($id): void
{
    $match = new Matche();
    $match->setId($id);

    echo json_encode($match->getSpecific());
    die;
}