<?php

class ControladorJuego{

    function ganar($eleccionOponente, $eleccionJugador){
        echo "<h1>Has ganado!!!!!</h1>";
        echo "<p>El oponente ha sacado: ". $eleccionOponente."</p>";
        echo "<p>Su <b>[".$eleccionJugador."]</b> gana a <b>[".$eleccionOponente."]</b> de la máquina</p>";
        $_SESSION['money'] = $_SESSION['money']+1;
        echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
        echo "<br/>";
        echo "<br/>";
    }

    function perder($eleccionOponente, $eleccionJugador){
        echo "<h1>Pierdes!!!!</h1>";
        echo "<p>El oponente ha sacado: ". $eleccionOponente."</p>";
        echo "<p>Su <b>[".$eleccionJugador."]</b> pierde contra <b>[".$eleccionOponente."]</b> de la máquina</p>";
        $_SESSION['money'] = $_SESSION['money']-1;
        echo "<p>Capital disponible: ".$_SESSION['money']."</p>";
        echo "<br/>";
        echo "<br/>";
    }

    function empatar($eleccionOponente, $eleccionJugador){
        echo "<h1>Empate!!!</h1>";
        echo "Su <b>[".$eleccionJugador."]</b> empata con <b>[".$eleccionOponente."]</b> de la máquina</p>";
        echo "<p>Capital disponible: ". $_SESSION['money']."</p>";
        echo "<br/>";
        echo "<br/>";
    }
}

?>
