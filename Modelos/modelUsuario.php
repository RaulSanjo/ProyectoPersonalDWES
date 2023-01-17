<?php
include "bd.php";
    class Usuario{
        public static function buscarUsuario($nombre){
        $bd = new Bd();
        $bd->crearConexion();
        $existe = false;
        $result=$bd->dataQuery("SELECT nombreUsuario from usuarios");
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
            $bd = new Bd();
            $bd->crearConexion();
            if(Usuario::buscarUsuario($nombre)){
                //comprobar contraseña
                $contraseña = md5($contraseña);
                $result=$bd->dataQuery("SELECT contraseña from usuarios where nombreUsuario='$nombre'");
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
            $bd = new Bd();
            $bd->crearConexion();
            $result=$bd->dataQuery("SELECT haVotado from usuarios where nombreUsuario='$nombre'");
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
            $bd = new Bd();
            $bd->crearConexion();
            $nombre = $_REQUEST['nombre'];
            $contraseña = $_REQUEST['contraseña'];
            $contraseña2=$_REQUEST['contraseña2'];
            if (!Usuario::buscarUsuario($nombre)) {
                if ($contraseña == $contraseña2) {
                    $contraseña = md5($contraseña);
                    $bd->dataQuery("Insert into usuarios (nombreUsuario,contraseña) values ('$nombre','$contraseña')");
                } else {
                    echo "<p class='msg'>Las contraseñas no coinciden</p>";
                }
            }else{
                echo "<p class='msg'>El usuario ya existe</p>";
            }  
        }
    }
?>