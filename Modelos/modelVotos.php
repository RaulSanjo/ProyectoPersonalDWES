<?php
include "bd.php";
/**
 * Clase que permite la obtención y manipulacion de los votos
 * 
 * @author Raúl San José <raulsj@alumnos.iesgalileo.es>
 */
class VotosJugadores{
    /**
     * Funcion que añade el voto de un usuario a la base de datos
     * 
     * @static
     * @access public
     * @param string $usuario Nombre del usuario
     * @return void
     */
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
    /**
     * Funcion que obtiene los votos realizados
     * 
     * @static
     * @access public
     * @return array Devuelve el array con los jugadores y sus votos
     */
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
        // devuelvo el array
        return $jugadores;
    }
}
?>