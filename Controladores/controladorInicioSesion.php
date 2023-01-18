<?php
    include "./../Modelos/modelUsuario.php";
    include "./../Vistas/inicioSesion.html";
    if (isset($_GET['entrar'])) {
        Usuario::iniciarSesion();
    }
?>