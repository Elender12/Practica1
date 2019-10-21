<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugar</title>
    <link rel="stylesheet" type="text/css" href="estilos/misestilos.css">
</head>

<body>
    <div>
        <form action="jugador.php" method="POST">
            <div>
                <label>Piedra</label><input class="button-width" type="radio" name="eleccion" value="piedra" />
                <label>Papel</label><input class="button-width" type="radio" name="eleccion" value="papel" />
                <label>Tijeras</label><input class="button-width" type="radio" name="eleccion" value="tijeras" />
                <label>Lagarto</label><input class="button-width" type="radio" name="eleccion" value="lagarto" />
                <label>Spock</label><input class="button-width" type="radio" name="eleccion" value="spock" />
            </div>
            <input type="submit" value="Jugar" />

        </form>
    </div>
    <div>
        <form action="index.php" method="POST">
            <input type="submit" value="Salir" />
        </form>
    </div>
</body>

</html>