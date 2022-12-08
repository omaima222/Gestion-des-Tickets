<?php

require '../model/Stadiums.php';

use App\Classes\Stadiums;

if (isset($_POST['save_stadium'])) save_stadium();
if (isset($_POST['delete_stadium'])) delete_stadium($_POST['delete_stadium']);

function save_stadium(): void
{
    $name = validate_input("{$_POST['stadium-name']}", 'text');
    $capacity = validate_input("{$_POST["stadium-capacity"]}", 'select');
    $address = validate_input("{$_POST["stadium-address"]}", 'text');
    $image = validate_input("{$_POST["stadium-image"]}", 'pass');

    if ($name == 'null' || $capacity == 'null' || $address == 'null' || $image == 'null') {
        $_SESSION['message'] = "Invalid inputs When Add Stadium !";
        header('location: ../pages/dashboard.php');
        die;
    }

    $stadium = new Stadiums();
    $stadium->setId($id);
    $stadium->setName($name);
    $stadium->setCapacity($capacity);
    $stadium->setAddress($address);
    $stadium->setImage($image);

    if ($stadium->add()) {
        $_SESSION['message'] = "Stadium has been added successfully !";
    } else {
        $_SESSION['message'] = "Error when add Stadium !";
    }
    header('location: ../pages/dashboard.php');
}


function delete_Stadium($id): void
{
    $stadium = new Stadiums();
    $stadium->setId($id);
    if ($stadium->delete()) {
        $_SESSION['message'] = "Stadium has been deleted successfully !";
    } else {
        $_SESSION['message'] = "Error when delete Stadium !";
    }
    header('location: ../pages/dashboard.php');
}
