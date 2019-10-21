<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugar</title>
    <link rel="stylesheet" type="text/css" href="estilos/misestilos.css">
    <script type="application/javascript">
        function redireccionarInicio(){
            window.open("index.html", "_self");
        }
    </script>
</head>

<body>
    <div>
        <form action="jugador.php" method="POST">
            <div>
                <div>
                    <label>Piedra</label>
                    <input type="radio" name="eleccion" value="piedra" />
                </div>
                <div>
                    <label>Papel</label>
                    <input type="radio" name="eleccion" value="papel" />
                </div>
                <div>
                    <label>Tijeras</label>
                    <input type="radio" name="eleccion" value="tijeras" />
                </div>
                <div>
                    <label>Lagarto</label>
                    <input type="radio" name="eleccion" value="lagarto" />
                </div>
                <div>
                    <label>Spock</label>
                    <input type="radio" name="eleccion" value="spock" />
                </div>
                <div>
                    <input type="submit" value="Jugar" /> 
                    <input type="button" onclick="redireccionarInicio()" value="Salir" />
                </div>
            </div>

        </form>
    </div>
</body>

</html>