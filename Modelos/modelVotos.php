<?php
include "bd.php";
class VotosJugadores{
    public static function realizarVoto($usuario){
        $bd = new Bd();
        $bd->crearConexion();
        $jugador = $_REQUEST['voto'];
        $bd->dataManipulation("update votos set numeroVotos=numeroVotos+1 where jugador='$jugador'"); 
        $bd->dataManipulation('update usuarios set haVotado=1 where nombreUsuario="' . $usuario . '"');
        $bd->cerrarConexion();
    }
    public static function getVotos()
    {
        $bd = new Bd();
        $bd->crearConexion();
        $result = $bd->dataQuery('Select * from votos order by numeroVotos desc, jugador asc');
        $jugadores = array();
        while ($row = $result->fetch_array()) {
            $jugadores[] = $row;
        }
        $bd->cerrarConexion();
        return $jugadores;
    }
}
?>