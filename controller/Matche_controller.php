<?php
include_once '../model/Connection.php';
include_once '../model/Matche.php';


use App\Classes\Matche;

$match = new Matche("", "", "", "", "", "", "");

$match->read();