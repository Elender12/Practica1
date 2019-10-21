<?php
session_start();
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
    $eleccionOponente = array("piedra","papel","tijeras","lagarto","spock");
    $eleccionJugador = $_POST['eleccion'];        

    if($arrayResultados[$numAleatorio][$eleccionJugador]==1){         
        echo "<h1>Has ganado!!!!!</h1>";
        echo "<p>El oponente ha sacado: ". $eleccionOponente[$numAleatorio]."</p>";
        echo "<p>Su [".$eleccionJugador."] gana a [".$eleccionOponente[$numAleatorio]."] de la máquina</p>";
        $_SESSION['money'] = $_SESSION['money']+1;
        echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
        echo "<br/>";
        echo "<br/>";

    }elseif ($arrayResultados[$numAleatorio][$eleccionJugador]==-1) {
        echo "<h1>Pierdes!!!!</h1>";
        echo "<p>El oponente ha sacado: ". $eleccionOponente[$numAleatorio]."</p>";
        echo "<p>Su [".$eleccionJugador."] pierde contra [".$eleccionOponente[$numAleatorio]."] de la máquina</p>";
        $_SESSION['money'] = $_SESSION['money']-1;
        echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
        echo "<br/>";
        echo "<br/>";

    }else {
        echo "<h1>Empate!!!</h1>";
        echo "Su [".$eleccionJugador."] empata con [".$eleccionOponente[$numAleatorio]."] de la máquina</p>";
        echo "<p>Capital disponible: ". $_SESSION['money']."</p>";
        echo "<br/>";
        echo "<br/>";
    }
}

include_once ("jugar.php");

?>