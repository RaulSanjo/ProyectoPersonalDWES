<?php
    include "./../Modelos/modelUsuario.php";
    include "./../Vistas/registro.html";
    if (isset($_GET['registrarse'])) {
        Usuario::insertarUsuario();
    }
?>