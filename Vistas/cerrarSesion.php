<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cerrarSesionCSS.css">
    <title>Qatar 2022</title>
    <style>
        
    </style>
</head>
<body>
    <?php
        //arranco la sesion
        session_start();
        //elimino la sesion
        session_destroy();
        echo "<p>Disfruta del mundial en <a href='https://golmundial.com/'>golmundial.com</a><br><br><br>Redirigiendo...</p>";
        //redirijo al login en 4 segundos de delay
        header( "refresh:4;url=inicio.php" );
    ?>
</body>
</html>