<?php
    include "./../Modelos/modelUsuario.php";
    include "./../Vistas/registro.html";
    //si pulso el boton registrarse, llamo a la funcion insertarUsuario de la clase Usuario
    if (isset($_GET['registrarse'])) {
        Usuario::insertarUsuario();
    }
?>