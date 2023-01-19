<?php
    include "./../Modelos/modelVotos.php";
    //creo una variable en la que guardo el array obtenido de la funcion getVotos de la clase VotosJugadores
    $jugadores = VotosJugadores::getVotos();
    include "./../Vistas/ranking.php";
    //si pulso al boton inicio, redirijo a otra pagina
    if(isset($_POST['inicio'])){
        header("Location : ./../index.php");
    }
?>