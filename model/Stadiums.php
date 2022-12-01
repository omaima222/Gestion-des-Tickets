<?php

namespace App\classes;

class Stadiums extends Connection{
    private $id;
    private $name;
    private $capacity;
    private $address;
    private $image;

    function __construct($id,$name,$capacity,$address,$image){
        $this-> id          = $id;
        $this-> name        = $name;
        $this-> capacity    = $capacity;
        $this-> address     = $address;
        $this-> image       = $image;
    }

    function read() :  void{
        $this-> connect();
    }

    function add($name,$capacity,$address,$image): void{
        // TODO: Implement add() method.
    }

    function update($id,$name,$capacity,$address,$image): void{
        // TODO: Implement update() method.
    }

    function delete($id): void{
        // TODO: Implement delete() method.
    }

}

?>