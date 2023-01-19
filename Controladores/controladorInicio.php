<?php
    include "Vistas/inicio.html";
    //si pulso el boton iniciar sesion,redirijo a otra pagina
    if(isset($_POST['iniciar'])){
        header("Location: Controladores/controladorInicioSesion.php");
    }
    //si pulso el boton registrarse,redirijo a otra pagina
    if(isset($_POST['registrarse'])){
        header("Location: Controladores/controladorRegistro.php");
    }
    //si pulso el boton ver ranking,redirijo a otra pagina
    if(isset($_POST['rank'])){
        header("Location: Controladores/controladorRanking.php");
    }
?>