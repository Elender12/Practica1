<?php
session_start();

include_once ("jugar.php");
require ("clases/controladorJuego.php");

if(isset($_POST['money'])){
    
    $money = $_POST['money'];
    $_SESSION['money'] = $money;
}


if(isset($_POST['eleccion'])){
    comenzarJuego();
}

    if( !isset($_SESSION['tu']) && !isset($_SESSION['machine'])){
        $tu= array();
        $maquina=array();
        
        $_SESSION['tu'] = $tu;
        $_SESSION['machine'] = $maquina;
    }
    // array_unshift($_SESSION['tu'],$eleccionJugador);
    // array_unshift($_SESSION['machine'],$eleccionOponente[$numAleatorio]);


    
    // for ($i=0; $i < 4; $i++) { 
    //     echo "TU".$_SESSION['tu'][$i]."<br/>";
    //     echo "maquina".$_SESSION['machine'][$i]."<br/>";
    //     echo "<br/>";
    // }
    


function comenzarJuego(){
    $arrayResultados = array(
        array(
            "piedra"=>0,
            "papel"=>1,
            "tijeras"=>-1,
            "lagarto"=>-1,
            "spock"=>1
            ),
        array(
            "piedra"=>-1,
            "papel"=>0,
            "tijeras"=>1,
            "lagarto"=>1,
            "spock"=>-1
            ),
        array(    
            "piedra"=>1,
            "papel"=>-1,
            "tijeras"=>0,
            "lagarto"=>-1,
            "spock"=>1
            ),
        array(    
            "piedra"=>1,
            "papel"=>-1,
            "tijeras"=>1,
            "lagarto"=>0,
            "spock"=>-1
            ),
        array(    
            "piedra"=>-1,
            "papel"=>1,
            "tijeras"=>-1,
            "lagarto"=>1,
            "spock"=>0
            ),
        );

    
    $numAleatorio = rand(0,4);
    $posibilidadesOponente = array("piedra","papel","tijeras","lagarto","spock");
    $eleccionOponente = $posibilidadesOponente[$numAleatorio];
    $eleccionJugador = $_POST['eleccion'];      
    $resultado = $arrayResultados[$numAleatorio][$eleccionJugador];

    $controladorJuego = new controladorJuego;

    if($resultado == 1){         
        $controladorJuego->ganar($eleccionOponente, $eleccionJugador);
    }elseif ($resultado == -1) {
        $controladorJuego->perder($eleccionOponente, $eleccionJugador);
    }else {
        $controladorJuego->empatar($eleccionOponente, $eleccionJugador);
    }
}

?>