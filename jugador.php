<?php
session_start();
ob_start();
// Inclusion de clases y ficheros
include_once ("jugar.php");
require ("clases/controladorJuego.php");
// Asignamos a la variable de sesion el dinero inical para que
// este diponible durante toda la ejecucion del programa
if(isset($_POST['money']) && isset($_POST['nombre']) && isset($_POST['cc']) && isset($_POST['mail'])){
    $money = $_POST['money'];
    $nombre = $_POST['nombre'];
    $cc = $_POST['cc'];
    $mail = $_POST['mail'];
    $pattern = '/[A-Za-z]@[A-Za-z].com$/';
    if($money>=1 && strlen($nombre)!=0 && strlen($cc)==24 && preg_match($pattern,$mail)==1){
        $_SESSION['money'] = $money;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['cc']= $cc;
    }else{
        header("Location: index.html");
        exit;
    }
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
        $_SESSION['tu'] = array();
        $_SESSION['machine'] = array();
    }
    array_unshift($_SESSION['tu'],$eleccionJugador);
    array_unshift($_SESSION['machine'],$eleccionOponente);
    if(count($_SESSION['tu'])<$movimientosAMostrar){
        $movimientosAMostrar=count($_SESSION['tu']);
    }
    echo "<div id='centro'>";
    echo"<table>";
    echo "<tr>";
    echo "<td>".$_SESSION['nombre']."</td>";
    bucle($_SESSION['tu'],$movimientosAMostrar);
    echo "<tr>";
    echo "<td> Makina </td>";
    bucle($_SESSION['machine'],$movimientosAMostrar);
    echo"</table>";
    echo "</div>";

}
    //funcion para reutilizar el for para generar la tabla de ultimas tiradas
    // la variable v es la variable de session a recorrer
    function bucle($v,$movimientosAMostrar){
        for ($i=0; $i < $movimientosAMostrar; $i++) { 
                echo "<td>".$v[$i]."</td>"; 
        }
        echo"</tr>";
}
ob_end_flush();
?>