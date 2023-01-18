<?php
        //arranco la sesion
        session_start();
        //elimino la sesion
        session_destroy();
        include "./../Vistas/cerrarSesion.html";
        //redirijo al login en 4 segundos de delay
        header( "refresh:4;url=./../Controladores/controladorInicio.php" );
    ?>