<?php

// Clase que controla la logica del juego contiene los metodos a instanciar
abstract class baseJuego{

    // Pinta por pantalla el texto indicando que el jugador ha ganado
    // Params: 
    //    $eleccionOponente = Elemento seleccionado por la máquina
    //    $eleccionJugador = Elemento seleccionado por el jugador
    //    $res = Resultado obtenido
    // Devuelve: Pinta por pantalla informacion sobre el resultado obtenido
    function comprobarTirada($eleccionOponente, $eleccionJugador, $res);
}

?>
