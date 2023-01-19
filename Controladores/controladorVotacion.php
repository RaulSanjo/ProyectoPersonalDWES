<?php
    //arranco la sesion
    session_start();
    //si no hay registrado nada en la variable de sesion
    if (!isset($_SESSION['sesionUsuario'])) {
        //redirijo a otra pagina
        header("Location: ./../Controladores/controladorInicioSesion.php");
    }else{
        include "./../Modelos/modelVotos.php";
        include "./../Vistas/votacion.html";
        //si pulso al boton enviar
        if (isset($_GET['enviar'])) {
            //llamo a la funcion de la clase VotosJugadores 'realizarVoto', le paso la variable de sesion y redirijo a otra pagina
            VotosJugadores::realizarVoto($_SESSION['sesionUsuario']);
            header("Location: ./../Vistas/votoRealizado.php");
        }
        // si pulso al boton cerrar sesion, elimino la sesion
        if (isset($_POST['out'])) {
            session_destroy();
        } 
    }
?>