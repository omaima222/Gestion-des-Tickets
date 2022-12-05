<?php
session_start();

require 'shared.php';
require '../model/Connection.php';
require '../model/Reservation.php';

use App\Classes\Reservation;

if (isset($_POST['reserve'])) reserve();
if (isset($_POST['delete_reservation'])) delete_reservation($_POST['delete_reservation']);

function reserve(): void
{
    $spectator_id = validate_input("{$_POST['reservation-spectator']}", 'select');
    $match_id = validate_input("{$_POST["reservation-match"]}", 'select');
    $quantity = validate_input("{$_POST["reservation-quantity"]}", 'select');
    $date_reservation = $_POST["reservation-date"];

    if ($spectator_id == 'null' || $match_id == 'null' || $quantity == 'null' || $date_reservation == 'null') {
        $_SESSION['message'] = "Invalid inputs When Reserve !";
        header('location: ../pages/dashboard.php');
        die;
    }

    $reservation = new Reservation();
    $reservation->setSpectatorId($spectator_id);
    $reservation->setMatchId($match_id);
    $reservation->setQuantity($quantity);
    $reservation->setDateReservation($date_reservation);

    if ($reservation->reserve()) {
        $_SESSION['message'] = "Reservation has been added successfully !";
    } else {
        $_SESSION['message'] = "Error when Reserve !";
    }
    header('location: ../pages/dashboard.php');
}

function delete_reservation($id): void
{
    $reservation = new Reservation();
    $reservation->setId($id);
    if ($reservation->delete()) {
        $_SESSION['message'] = "Reservation has been deleted successfully !";
    } else {
        $_SESSION['message'] = "Error when delete Reservation !";
    }
    header('location: ../view/home.php');
}