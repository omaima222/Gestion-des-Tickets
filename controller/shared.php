<?php

session_start();

require_once '../model/Connection.php';
require_once '../controller/Matche_controller.php';
require_once '../controller/User_controller.php';
require_once '../controller/Stadium_controller.php';
require_once '../controller/Teams_controller.php';
require_once '../controller/Reservation_controller.php';

function validate_input($input, $type): string
{
    return match ($type) {
        "text" => preg_match("/^[a-zA-Z0-9\s]+$/", $input) ? $input : 'null',
        "price" => preg_match("/^[0-9.]+$/", $input) ? $input : 'null',
        "pass" => preg_match("/^[a-zA-Z0-9$#@.%]{8,}$/", $input) ? $input : 'null',
        "email" => filter_var($input, FILTER_VALIDATE_EMAIL) ? $input : 'null',
        "select" => preg_match("/^[0-9]+$/", $input) ? $input : 'null',
        "selectAlphabet" => preg_match("/^[A-Z]+$/", $input) ? $input : 'null',
        default => "null",
    };
}

function separate_date($date): array
{
    $toDate = strtotime($date);
    $day = date('d', $toDate);
    $month = date('m', $toDate);
    return [$day, toMonthString($month)];
}

function toMonthString($number): string
{
    return match ($number) {
        "01" => 'JAN',
        "02" => 'FEB',
        "03" => 'MAR',
        "04" => 'APR',
        "05" => 'MAY',
        "06" => 'JUN',
        "07" => 'JUL',
        "08" => 'AUG',
        "09" => 'SEP',
        "10" => 'OCT',
        "11" => 'NOV',
        "12" => 'DEC',
        default => "null",
    };
}

function upload_image($image, $dir): string
{
    if (!$image["size"] > 0) {
        return '';
    }

    $target_dir = "../assets/images/$dir/";
    $target_file = $target_dir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG files are allowed !";
        header("location: $dir.php");
        die();
    }

    if ($image["size"] > 10048576) {
        $_SESSION['message'] = "Sorry, your image is large than 1mb !";
        header("location: $dir.php");
        die();
    }

    // change file name
    $random = rand(0, 100000);
    $rename = "Image".date('ymd')."$random.$imageFileType";

    if (file_exists($target_dir.$rename)) {
        $_SESSION['message'] = "Sorry, file already exists !";
        header("location: $dir.php");
        die();
    }

    if (move_uploaded_file($image["tmp_name"], $target_dir.$rename)) {
        return $rename;
    } else {
        $_SESSION['message'] = "Sorry, there was an error uploading your image.";
        header("location: $dir.php");
        die();
    }

    return '';
}

function delete_image($image, $dir): void
{
    $target_dir = "../assets/images/$dir/";
    unlink($target_dir.$image);
}