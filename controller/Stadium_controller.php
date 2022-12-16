<?php

require '../model/Stadiums.php';

use App\Classes\Stadiums;

if (isset($_POST['save_stadium'])) save_stadium();
if (isset($_POST['delete_stadium'])) delete_stadium($_POST['delete_stadium']);

function get_stadiums(): bool|array
{
    $stadium = new Stadiums();
    return $stadium->read();
}

function save_stadium(): void
{
    $name = validate_input("{$_POST['stadium-name']}", 'text');
    $capacity = validate_input("{$_POST["stadium-capacity"]}", 'select');
    $address = validate_input("{$_POST["stadium-address"]}", 'text');
    $image = upload_image($_FILES["stadium-image"], 'stadium');

    if ($name == 'null' || $capacity == 'null' || $address == 'null' || $image == '') {
        $_SESSION['message'] = "Invalid inputs When Add Stadium !";
        header('location: stadium.php');
        die;
    }

    $stadium = new Stadiums();
    $stadium->setName($name);
    $stadium->setCapacity($capacity);
    $stadium->setAddress($address);
    $stadium->setImage($image);

    if ($stadium->add()) {
        $_SESSION['message'] = "Stadium has been added successfully !";
    } else {
        $_SESSION['message'] = "Error when add Stadium !";
    }
    header('location: stadium.php');
}

function delete_Stadium($id): void
{
    $stadium = new Stadiums();
    $stadium->setId($id);
    delete_image($stadium->read("WHERE id = $id")[0]['image'], 'stadium');
    if ($stadium->delete()) {
        $_SESSION['message'] = "Stadium has been deleted successfully !";
    } else {
        $_SESSION['message'] = "Error when delete Stadium !";
    }
    header('location: stadium.php');
}
