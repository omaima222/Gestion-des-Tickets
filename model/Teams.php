<?php

namespace App\classes;

class Teams extends Connection{
    private $id;
    private $name;
    private $logo;
    private $image;
    private $groupe;

    function __construct($id,$name,$logo,$image,$groupe){
        $this-> id      = $id;
        $this-> name    = $name;
        $this-> logo    = $logo;
        $this-> image   = $image;
        $this-> groupe  = $groupe;
    }

    function read() :  void{
        $this-> connect();
    }

    function add($name,$logo,$image,$groupe): void{
        // TODO: Implement add() method.
    }

    function update($id,$name,$logo,$image,$groupe): void{
        // TODO: Implement update() method.
    }

    function delete($id): void{
        // TODO: Implement delete() method.
    }

}

?>