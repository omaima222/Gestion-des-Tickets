<?php

require '../model/User.php';
require '../model/Reservation.php';

use App\Classes\Reservation;
use App\Classes\User;


if (isset($_POST["signup"])) Signup();
if (isset($_POST["login"])) Login();
if (isset($_POST["update"])) Update();
if (isset($_GET["updateId"])) Display();
if (isset($_GET["deleteAcc"])) Delete();
if (isset($_GET["logout"])) Logout();


function Signup(): void
{
    $user = new User();

    $user->setEmail($_POST["Semail"]);
    $user->setPassword($_POST["Spassword"]);
    $user->setFirstName($_POST["SfirstName"]);
    $user->setLastName($_POST["SlastName"]);
    $user->setImage($_FILES['pfp']['tmp_name']);
    $user->setPic($_FILES['pfp']['name']);

    if (empty($user->pic)) {
        $user->setPic('user.png');
    }
    $user->signup();
    header("Location:login.php");

}

function Login(): void
{
    $user = new User();

    $user->setEmail($_POST["email"]);
    $user->setPassword($_POST["password"]);

    $result = $user->login();
    if ($result) {
        $_SESSION['isAdmin'] = $result['is_admin'];
        $_SESSION['userId'] = $result['id'];
        header("Location:landingPage.php");
    } else {
        $_SESSION['errorlogin'] = "incorrect inputs";
        header("Location:login.php");
    }
}

function Logout(): void
{

    $user = new User();
    if (isset($_SESSION['userId'])) {
        $user->logout();
        var_dump($user);
    }
    header("Location: ../index.php");
}

function Update(): void
{
    $user = new User();

    $user->setEmail($_POST["email"]);
    $user->setPassword($_POST["password"]);
    $user->setFirstName($_POST["firstName"]);
    $user->setLastName($_POST["lastName"]);
    $user->setImage($_FILES['pfp']['tmp_name']);
    $user->setPic($_FILES['pfp']['name']);
    if (empty($user->pic)) {
        $user->setPic('user.png');
    }
    $user->update($_SESSION['userId']);
    header("Location:landingPage.php");
}

function Display()
{
    $user = new User();
    return $user->display($_SESSION['userId']);
}

function Delete(): void
{
    $user = new User();
    $user->delete($_SESSION['userId']);
    header("Location: ../index.php");
}

function DisplayReservations(): bool|array
{
    $reservation = new Reservation();
    $reservation->setSpectatorId($_SESSION['userId']);
    return $reservation->getSpecific();
}

function Get_user(): bool|array
{
    $user = new User();
    return $user->get_user();
}

function displayTicket(): bool|array
{
    $ticket = new Reservation();
    return $ticket->getSpecificTicket($_GET['TicketId']);
}


