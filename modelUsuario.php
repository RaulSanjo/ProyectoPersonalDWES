<?php 
    class Usuario{
        
        public static function buscarUsuario($nombre){
            $host = 'localhost';
        $db = 'votacion';
        $user = 'root';
        $pass = '';
        // Crear conexion
        $conexion = new mysqli();
        $conexion->connect($host, $user, $pass, $db);
        $existe = false;
        $result=$conexion->query("SELECT nombreUsuario from usuarios");
        if($result->num_rows>0){
            //Por cada linea de la consulta
            while($row = $result->fetch_assoc()) {
                if($nombre==$row['nombreUsuario']) {
                    $existe=true;
                }
            }
        }
        return $existe;
        }

        public static function verificarContrasena($nombre,$contraseña){
            $host = 'localhost';
            $db = 'votacion';
            $user = 'root';
            $pass = '';
            // Crear conexion
            $conexion = new mysqli();
            $conexion->connect($host, $user, $pass, $db);
            if(Usuario::buscarUsuario($nombre)){
                //comprobar contraseña
                $contraseña = md5($contraseña);
                $result=$conexion->query("SELECT contraseña from usuarios where nombreUsuario='$nombre'");
                while ($row = $result->fetch_assoc()) {
                    if($row['contraseña'] == $contraseña){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
        }

        public static function haVotado($nombre){
            $host = 'localhost';
            $db = 'votacion';
            $user = 'root';
            $pass = '';
            // Crear conexion
            $conexion = new mysqli();
            $conexion->connect($host, $user, $pass, $db);
            $result=$conexion->query("SELECT haVotado from usuarios where nombreUsuario='$nombre'");
            while ($row = $result->fetch_assoc()) {
            if($row['haVotado'] == "1"){
                return true;
            }else{
                header("Location: haVotado.php");
            }
        }
        }
        public static function iniciarSesion(){
            $nombre = $_REQUEST['usuario'];
            $contraseña = $_REQUEST['contraseña'];
            if (!Usuario::haVotado($nombre)) {
                if (Usuario::verificarContrasena($nombre, $contraseña)) {
                    session_start();
                    $_SESSION['sesionUsuario'] = $nombre;
                    header("Location: controladorVotacion.php");
                } else {
                    echo "<p>Contraseña incorrecta</p>";
                }
            }else{
                echo "<p>Este usuario ya ha votado</p>";
            }
        }
        public static function insertarUsuario(){
            //Parámetros de conexion
        $host = 'localhost';
        $db = 'votacion';
        $user = 'root';
        $pass = '';
        // Crear conexion
        $conexion = new mysqli();
        $conexion->connect($host, $user, $pass, $db);
        $nombre = $_REQUEST['nombre'];
        $contraseña = $_REQUEST['contraseña'];
        $contraseña2=$_REQUEST['contraseña2'];
        if (!Usuario::buscarUsuario($nombre)) {
            if ($contraseña == $contraseña2) {
                $contraseña = md5($contraseña);
                $conexion->query("Insert into usuarios (nombreUsuario,contraseña) values ('$nombre','$contraseña')");
            } else {
                echo "<p class='msg'>Las contraseñas no coinciden</p>";
            }
        }else{
            echo "<p class='msg'>El usuario ya existe</p>";
        }  
    }
    }
?>