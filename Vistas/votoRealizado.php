<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="votoRealizadoCSS.css">
    <title>Qatar 2022</title>
    <?php
        session_start();
    ?>
    <style>
    
    </style>
</head>
<body>
    <p>Su voto ha sido realizado correctamente.</p>
    <div>
        <form method="post" action="inicio.php">
            <button name="inicio">Inicio</button>
        </form>
        <form method="post" action="ranking.php">
            <button name="verRank">Ranking</button>
        </form>
    </div>
    <?php
        session_destroy();
        if(isset($_POST['inicio'])){
            header("Location: inicio.php");
        }
        if(isset($_POST['verRank'])){
            header("Location: ranking.php");
        }
    ?>
</body>
</html>