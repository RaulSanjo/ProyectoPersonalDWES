<?php
class VotosJugadores
{
    public static function realizarVoto($usuario){
        //Parámetros de conexion
        $host = 'localhost';
        $db = 'votacion';
        $user = 'root';
        $pass = '';
        // Crear conexion
        $conexion = new mysqli();
        $conexion->connect($host, $user, $pass, $db);
        $jugador = $_REQUEST['voto'];
        $sql = "update votos set numeroVotos=numeroVotos+1 where jugador='$jugador'";
        $result=$conexion->query($sql);
        if($result){
            $result2 = $conexion->query('update usuarios set haVotado=1 where nombreUsuario="' . $usuario . '"');
            if($result2){
                header("Location: votoRealizado.php");
            }else{
                echo "<p>Error al realizar el voto ( error al setera campo haVotado )</p>";
            }
        }else{
            echo "<p>Error al realizar el voto ( error al setear</p>";
        }
    }
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