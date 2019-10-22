<?php
session_start();

// Inclusion de clases y ficheros
require ("jugar.php");
require ("clases/controladorJuego.php");

// Asignamos a la variable de sesion el dinero inical para que
// este diponible durante toda la ejecucion del programa
if(isset($_POST['money'])){
    $money = $_POST['money'];
    $_SESSION['money'] = $money;
}
if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $_SESSION['nombre'] = $nombre;
}

// Si hemos elegido una tirada comenzará el programa
if(isset($_POST['eleccion'])){
    comenzarJuego();  
}

// Funcion que contiene la logica del juego
function comenzarJuego(){
    // Creamos una matriz con los valores seleccionables y su valor
    $arrayResultados = array(
        array("piedra"=>0, "papel"=>1, "tijeras"=>-1, "lagarto"=>-1, "spock"=>1),
        array("piedra"=>-1, "papel"=>0, "tijeras"=>1, "lagarto"=>1, "spock"=>-1),
        array("piedra"=>1, "papel"=>-1, "tijeras"=>0, "lagarto"=>-1, "spock"=>1),
        array("piedra"=>1, "papel"=>-1, "tijeras"=>1, "lagarto"=>0, "spock"=>-1),
        array("piedra"=>-1, "papel"=>1, "tijeras"=>-1, "lagarto"=>1, "spock"=>0 ));

    // Se genera un numero aleatorio que servira para generar la tirada de la
    // máquina, también se utilizara para determinar el resultado
    $numAleatorio = rand(0,4);
    $eleccionOponente = generarTiradaMaquina($numAleatorio);
    $eleccionJugador = $_POST['eleccion'];      
    $resultado = $arrayResultados[$numAleatorio][$eleccionJugador];
    
    // Creamos una instancia de la clase que contiene la logica en caso de ganar, perder o empatar
    $controladorJuego = new controladorJuego;
        
    $controladorJuego->comprobarTirada($eleccionOponente, $eleccionJugador, $resultado);

    mostrarHistorial($eleccionOponente, $eleccionJugador);
    
}

// Genera la eleccion del oponente
//  Parametros: Numero que indica la posicion del array a coger
//  Devuelve: El elemento del oponente
function generarTiradaMaquina($numAleatorio){
    $posibilidadesOponente = array("piedra","papel","tijeras","lagarto","spock");
    $eleccionOponente = $posibilidadesOponente[$numAleatorio];
    return $eleccionOponente;
}

// Muestra el historial de los ultimos movimientos
function mostrarHistorial($eleccionOponente, $eleccionJugador){
    $movimientosAMostrar = 5;
    if( !isset($_SESSION['tu']) && !isset($_SESSION['machine'])){
        $tu= array();
        $maquina=array();
        
        $_SESSION['tu'] = $tu;
        $_SESSION['machine'] = $maquina;
    }

    array_unshift($_SESSION['tu'],$eleccionJugador);
    array_unshift($_SESSION['machine'],$eleccionOponente);


    if(count($_SESSION['tu'])<$movimientosAMostrar){
        $movimientosAMostrar=count($_SESSION['tu']);
    }
    echo"<table>";
    echo "<tr>";
    echo "<td>".$_SESSION['nombre']."</td>";
    for ($i=0; $i < $movimientosAMostrar; $i++) { 
            echo "<td>".$_SESSION['tu'][$i]."</td>"; 
    }
    echo"</tr>";
    echo "<tr>";
    echo "<td> Makina </td>";
    for ($i=0; $i < $movimientosAMostrar; $i++) { 
        echo "<td>".$_SESSION['machine'][$i]."</td>";
    }
    echo"</table>";
}
?>