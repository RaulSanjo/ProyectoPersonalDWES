<?php
    //arranco la sesion
    session_start();
    include "./../Vistas/haVotado.html";
    //elimino la sesion
    session_destroy();
    //si pulso el boton ver ranking, redirijo a otra pagina
    if(isset($_POST['verRank'])){
        header("Location: Controladores/controladorRanking.php");
        //si pulso el boton inicio, redirijo a otra pagina
    }else if(isset($_POST['inicio'])){
        header("Location: ./../index.php");
    }
    ?>