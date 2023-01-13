<?php
    include "modelUsuario.php";
    include "inicioSesion.php";
    session_start();
    if (!isset($_SESSION['sesionUsuario'])) {
        header("Location: inicioSesion.php");
    }else{
        if (isset($_GET['entrar'])) {
            Usuario::iniciarSesion();
        }
    }
    
?>