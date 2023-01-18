<?php
    include "./../Modelos/modelVotos.php";
    $jugadores = VotosJugadores::getVotos();
    include "./../Vistas/ranking.php";
    if(isset($_POST['inicio'])){
        header("Location : ./../Controladores/controladorInicio.php");
    }
?>