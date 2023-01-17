<?php
    include "./../Modelos/modelUsuario.php";
    include "./../Vistas/registro.php";
    if (isset($_GET['registrarse'])) {
        Usuario::insertarUsuario();
    }
?>