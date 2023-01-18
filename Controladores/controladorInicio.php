<?php
    include "./../Vistas/inicio.html";

    if(isset($_POST['iniciar'])){
        header("Location: ./../Controladores/controladorInicioSesion.php");
    }
    if(isset($_POST['registrarse'])){
        header("Location: ./../Controladores/controladorRegistro.php");
    }
    if(isset($_POST['rank'])){
        header("Location: ./../Controladores/controladorRanking.php");
    }
?>