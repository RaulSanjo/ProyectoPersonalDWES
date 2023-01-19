<?php
include "bd.php";
class VotosJugadores{
    public static function realizarVoto($usuario){
        //instancio un objeto de la clase Bd
        $bd = new Bd();
        //creo la conexion
        $bd->crearConexion();
        //recojo los datos del formulario
        $jugador = $_REQUEST['voto'];
        //ejecuto las consultas 
        $bd->dataManipulation("update votos set numeroVotos=numeroVotos+1 where jugador='$jugador'"); 
        $bd->dataManipulation('update usuarios set haVotado=1 where nombreUsuario="' . $usuario . '"');
        //cierro la conexion
        $bd->cerrarConexion();
    }
    public static function getVotos()
    {
        //instancio un objeto de la clase Bd
        $bd = new Bd();
        //creo la conexion
        $bd->crearConexion();
        //ejecuto la consulta
        $result = $bd->dataQuery('Select * from votos order by numeroVotos desc, jugador asc');
        //creo un array para guardar los resultados obtenidos
        $jugadores = array();
        //por cada linea de la consulta la guardo en el array
        while ($row = $result->fetch_array()) {
            $jugadores[] = $row;
        }
        //cierro la conexion
        $bd->cerrarConexion();
        return $jugadores;
    }
}
?>