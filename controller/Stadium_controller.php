<?php
include_once '../model/Connection.php';
include_once '../model/Stadiums.php';


use App\Classes\Stadiums;

$stadium = new Stadiums("", "", "", "","");

$stadium->read();