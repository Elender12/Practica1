<?php
include "baseJuego.php";
include_once ("foto.php");
// Clase que controla la logica del juego contiene los metodos a instanciar
class ControladorJuego extends baseJuego{
    // Pinta por pantalla el texto indicando que el jugador ha ganado
    // Params: 
    //    $eleccionOponente = Elemento seleccionado por la máquina
    //    $eleccionJugador = Elemento seleccionado por el jugador
    //    $res = Resultado obtenido
    // Devuelve: Pinta por pantalla informacion sobre el resultado obtenido
    function comprobarTirada($eleccionOponente, $eleccionJugador, $res){
        $foto = new foto;
        switch ($res) {
            case 1:
                echo "<div id='centro'>";
                echo "<h1>Has ganado!!!!!</h1>";
                echo "<p>Su  <img src='".$foto->mostrar($eleccionJugador)."' height='50' width='50'/> gana a <img src='".$foto->mostrar($eleccionOponente)."' height='50' width='50'/> de la máquina</p>";
                $_SESSION['money'] = $_SESSION['money']+1;
                echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
                echo "<br/>";
                echo "<br/>";
                echo "</div>";
                break;
            case -1:
                echo "<div id='centro'>";
                echo "<h1>Pierdes!!!!</h1>";
                echo "<p>Su  <img src='".$foto->mostrar($eleccionJugador)."' height='50' width='50'/> gana a <img src='".$foto->mostrar($eleccionOponente)."' height='50' width='50'/> de la máquina</p>";
                $_SESSION['money'] = $_SESSION['money']-1;
                echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
                echo "<br/>";
                echo "<br/>";
                echo "</div>";
                break;
            case 0:
                echo "<div id='centro'>";
                echo "<h1>Empate!!!</h1>";
                echo "<p>Su  <img src='".$foto->mostrar($eleccionJugador)."' height='50' width='50'/> gana a <img src='".$foto->mostrar($eleccionOponente)."' height='50' width='50'/> de la máquina</p>";
                echo "<p>Capital disponible: ". $_SESSION['money']."</p>";
                echo "<br/>";
                echo "<br/>";
                echo "</div>";
                break;
            default:
                return;
        }
    }
}
?>