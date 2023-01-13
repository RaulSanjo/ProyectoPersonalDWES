<?php
    include "modelRanking.php";
    $jugadores = VotosJugadores::getVotos();
    include "ranking.php";
    if(isset($_POST['inicio'])){
        header("Location : inicio.php");
    }
?>