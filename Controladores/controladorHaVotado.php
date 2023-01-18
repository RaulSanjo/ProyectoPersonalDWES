<?php
    session_start();
    include "./../Vistas/haVotado.html";
    if(isset($_POST['verRank'])||isset($_POST['inicio'])){
        session_destroy();
    }
    if(isset($_POST['verRank'])){
        header("Location: ./../Controladores/controladorRanking.php");
    }else if(isset($_POST['inicio'])){
        header("Location: ./../Controladores/controladorInicio.php");
    }
    ?>