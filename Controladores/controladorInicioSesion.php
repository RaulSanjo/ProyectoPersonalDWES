<?php
    include "modelUsuario.php";
    include "inicioSesion.php";
    if (isset($_GET['entrar'])) {
        Usuario::iniciarSesion();
    }
?>