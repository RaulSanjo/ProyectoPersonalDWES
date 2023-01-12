<?php
class VotosJugadores
{
    public static function getVotos()
    {
        //Parámetros de conexion
        $host = 'localhost';
        $db = 'votacion';
        $user = 'root';
        $pass = '';
        // Crear conexion
        $conexion = new mysqli();
        $conexion->connect($host, $user, $pass, $db);
        $sql = 'Select * from votos order by numeroVotos desc, jugador asc';
        $result = $conexion->query($sql);

        $jugadores = array();
        while ($row = $result->fetch_array()) {
            $jugadores[] = $row;
        }
        return $jugadores;
    }
}
?>