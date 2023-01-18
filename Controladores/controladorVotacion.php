<?php
    session_start();
    if (!isset($_SESSION['sesionUsuario'])) {
        header("Location: ./../Controladores/controladorInicioSesion.php");
    }else{
    include "./../Modelos/modelVotos.php";
    include "./../Vistas/votacion.html";

        if (isset($_GET['enviar'])) {
            VotosJugadores::realizarVoto($_SESSION['sesionUsuario']);
            header("Location: ./../Vistas/votoRealizado.php");
        }
        if (isset($_POST['out'])) {
            session_destroy();
        } 
    }
?>