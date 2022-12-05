<?php
include_once '../model/Connection.php';
include_once '../model/Teams.php';


use App\Classes\Teams;

$team = new Teams("", "", "", "","");

$team->read();