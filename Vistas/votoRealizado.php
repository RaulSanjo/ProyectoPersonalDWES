<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./../Estilos/votoRealizadoCSS.css">
    <title>Qatar 2022</title>
    <?php
        session_start();
        //elimino la sesion 
        session_destroy();
    ?>
</head>
<body>
    <p>Su voto ha sido realizado correctamente.</p>
    <div>
        <form method="post" action="./../index.php">
            <button name="inicio">Inicio</button>
        </form>
        <form method="post" action="../Controladores/controladorRanking.php">
            <button name="verRank">Ranking</button>
        </form>
    </div>
</body>
</html>