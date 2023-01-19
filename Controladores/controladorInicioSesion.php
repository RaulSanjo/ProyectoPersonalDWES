<?php
    include "./../Modelos/modelUsuario.php";
    include "./../Vistas/inicioSesion.html";
    //si pulso al boton entrar, llamo a la funcion iniciarSesion de la clase Usuario
    if (isset($_GET['entrar'])) {
        Usuario::iniciarSesion();
    }
?>