<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../Estilos/inicioCSS.css">
    <title>MUNDIAL</title>
</head>
<body>
    <h1>INICIO</h1>
    <form method="post">
        <button id="in" name="iniciar">Iniciar sesión</button>
        <button id="rg" name="registrarse">Registrarse</button>
        <button id="rk" name="rank">Ver ranking</button>
    </form>
    <?php
        if(isset($_POST['iniciar'])){
            header("Location: ./../Controladores/controladorInicioSesion.php");
        }
        if(isset($_POST['registrarse'])){
            header("Location: ./../Controladores/controladorRegistro.php");
        }
        if(isset($_POST['rank'])){
            header("Location: ./../Controladores/controladorRanking.php");
        }
    ?>
</body>
</html>