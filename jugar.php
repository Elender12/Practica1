<?php
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugar</title>
    <link rel="stylesheet" type="text/css" href="estilos/misestilos.css">

    <?php


        $redirigir = function(){
            show_source(jugador.php);
        };

        $destruirSesion = function(){
            session_destroy();
            header("Location: index.html");
        };

        if(array_key_exists('jugar', $_POST)) { 
            $redirigir();
        } 
        else if(array_key_exists('salir', $_POST)) { 
            $destruirSesion();
        } 
 
        
    ?>
    
</head>

<body>
    <div align="center">
        <form method="POST">
            <div>
                <h1>Elige tu opción con sabiduría:</h1>
                <div>
                    <label class="opciones">Piedra</label>
                    <input type="radio" name="eleccion" value="piedra" />
                </div>
                <div>
                    <label class="opciones">Papel</label>
                    <input type="radio" name="eleccion" value="papel" />
                </div>
                <div>
                    <label class="opciones">Tijeras</label>
                    <input type="radio" name="eleccion" value="tijeras" />
                </div>
                <div>
                    <label class="opciones">Lagarto</label>
                    <input type="radio" name="eleccion" value="lagarto" />
                </div>
                <div>
                    <label class="opciones">Spock</label>
                    <input type="radio" name="eleccion" value="spock" />
                </div>
                <div>
                    <input type="submit" name="jugar" value="Jugar" />
                    <input type="submit" name="salir" value="Salir" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>