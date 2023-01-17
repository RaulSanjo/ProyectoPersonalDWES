<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../Estilos/rankingCSS.css">
    <title>Qatar 2022</title>
</head>
<body>
    <h1>Ranking votación</h1>
    <div class="rank">
    <?php
        $i = 1;
        foreach($jugadores as $jugador){
        echo "<p>$i º " . $jugador['jugador'] ." ( ".$jugador['numeroVotos']. " )</p><hr>";
        $i++;
        }
    ?>
    </div>
    <div>
        <form method="post" action="./../Vistas/inicio.php">
            <button name="inicio">Inicio</button>
        </form>
    </div>

</body>
</html>