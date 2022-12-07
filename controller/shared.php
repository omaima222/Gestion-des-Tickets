<?php

session_start();

require_once '../model/Connection.php';
require_once '../controller/Matche_controller.php';
require_once '../controller/User_controller.php';

function validate_input($input, $type): string
{
    return match ($type) {
        "text" => preg_match("/^[a-zA-Z0-9]+$/", $input) ? $input : 'null',
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
        "1" => 'JAN',
        "2" => 'FEB',
        "3" => 'MAR',
        "4" => 'APR',
        "5" => 'MAY',
        "6" => 'JUN',
        "7" => 'JUL',
        "8" => 'AUG',
        "9" => 'SEP',
        "10" => 'OCT',
        "11" => 'NOV',
        "12" => 'DEC',
        default => "null",
    };
}