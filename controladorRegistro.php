<?php
    include "modelUsuario.php";
    include "registro.php";
    if (isset($_GET['registrarse'])) {
        Usuario::insertarUsuario();
    }
?>