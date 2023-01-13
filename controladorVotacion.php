<?php
    include "modelRanking.php";
    include "votacion.php";
    session_start();
    if (!isset($_SESSION['sesionUsuario'])) {
        header("Location: controladorInicioSesion.php");
    }else{
        if (isset($_GET['enviar'])) {
            VotosJugadores::realizarVoto($_SESSION['sesionUsuario']);
        }
        if (isset($_POST['out'])) {
            session_destroy();
        } 
    }
?>