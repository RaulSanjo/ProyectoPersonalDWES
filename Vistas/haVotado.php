<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../Estilos/haVotadoCSS.css">
    <title>Qatar 2022</title>
    <?php
        session_start();
    ?>
    <style>
    
    </style>
</head>
<body>
    <p>Este usuario ya ha realizado su voto.</p>
    <div>
        <form method="post" action="./../Vistas/inicio.php">
            <button name="inicio">Inicio</button>
        </form>
        <form method="post" action="./../Vistas/ranking.php">
            <button name="verRank">Ranking</button>
        </form>
    </div>
    <?php
        if(isset($_POST['verRank'])||isset($_POST['inicio'])){
            session_destroy();
        }
        if(isset($_POST['verRank'])){
        header("Location: ./../Vistas/ranking.php");
        }
    ?>
</body>
</html>