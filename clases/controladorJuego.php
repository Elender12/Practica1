<?php

// Clase que controla la logica del juego contiene los metodos a instanciar
class ControladorJuego{

    // Pinta por pantalla el texto indicando que el jugador ha ganado
    // Params: 
    //    $eleccionOponente = Elemento seleccionado por la máquina
    //    $eleccionJugador = Elemento seleccionado por el jugador
    //    $res = Resultado obtenido
    // Devuelve: Pinta por pantalla informacion sobre el resultado obtenido
    function comprobarTirada($eleccionOponente, $eleccionJugador, $res){
        switch ($res) {
            case 1:
                echo "<h1>Has ganado!!!!!</h1>";
                echo "<p>El oponente ha sacado: ". $eleccionOponente."</p>";
                echo "<p>Su <b>[".$eleccionJugador."]</b> gana a <b>[".$eleccionOponente."]</b> de la máquina</p>";
                $_SESSION['money'] = $_SESSION['money']+1;
                echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
                echo "<br/>";
                echo "<br/>";
                break;
            case -1:
                echo "<h1>Pierdes!!!!</h1>";
                echo "<p>El oponente ha sacado: ". $eleccionOponente."</p>";
                echo "<p>Su <b>[".$eleccionJugador."]</b> pierde contra <b>[".$eleccionOponente."]</b> de la máquina</p>";
                $_SESSION['money'] = $_SESSION['money']-1;
                echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
                echo "<br/>";
                echo "<br/>";
                break;
            case 0:
                echo "<h1>Empate!!!</h1>";
                echo "Su <b>[".$eleccionJugador."]</b> empata con <b>[".$eleccionOponente."]</b> de la máquina</p>";
                echo "<p>Capital disponible: ". $_SESSION['money']."</p>";
                echo "<br/>";
                echo "<br/>";
                break;
            default:
                return;
        }
    }
}

?>
