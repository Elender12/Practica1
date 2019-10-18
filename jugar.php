<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugar</title>
</head>
<body>
    <div>
    <form action="jugador.php" method="POST">
    Piedra<input type="radio" name="eleccion" value="piedra"/>
    Papel<input type="radio" name="eleccion" value="papel"/>
    Tijeras<input type="radio" name="eleccion" value="tijeras"/>
    Lagarto<input type="radio" name="eleccion" value="lagarto"/>
    Spock<input type="radio" name="eleccion" value="spock"/></p>

    <p><input type="submit" value="Jugar"/></p>
    </div>
    <div>
    </form>
    <form action="index.php" method="POST">
    <input type="submit" value="Salir"/>
    </form>
    <div>
</body>
</html>

