<?php
    session_start();
    if (!isset($_SESSION['sesionUsuario'])) {
        header("Location: controladorInicioSesion.php");
    }else{
    include "modelVotos.php";
    include "votacion.php";

        if (isset($_GET['enviar'])) {
            VotosJugadores::realizarVoto($_SESSION['sesionUsuario']);
            header("Location: votoRealizado.php");
        }
        if (isset($_POST['out'])) {
            session_destroy();
        } 
    }
?>