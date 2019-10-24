<?php

class foto{

    public $piedra;
    public $papel;
    public $tijeras;
    public $lagarto;
    public $spock;

    function __construct() {
        
        $this->piedra = "img/piedra.jpg";
        $this->papel = "img/papel.jpg";
        $this->tijeras = "img/tijeras.jpg";
        $this->lagarto = "img/lagarto.jpg";
        $this->spock = "img/spock.jpg";
    }

    public function mostrar($eleccion){
        switch ($eleccion) {
            case "piedra":
                return $this->piedra;
                break;
            case "papel":
                return $this->papel;
                break;
            case "tijeras":
                return $this->tijeras;
                break;
            case "lagarto":
                return $this->lagarto;
                break;
            case "spock":
                return $this->spock;
                break;
            default:
                return;
        }
    }


}

?>