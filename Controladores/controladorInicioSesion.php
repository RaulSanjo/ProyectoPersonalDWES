<?php
    include "./../Modelos/modelUsuario.php";
    include "./../Vistas/inicioSesion.php";
    if (isset($_GET['entrar'])) {
        Usuario::iniciarSesion();
    }
?>