<?php
include "bd.php";
    class Usuario{
        public static function buscarUsuario($nombre){
            //instancio un objeto de la clase Bd   
            $bd = new Bd();
            //creo la conexion
            $bd->crearConexion();
            //creo una variable donde recojo un booleano
            $existe = false;
            //ejecuto la consulta
            $result=$bd->dataQuery("SELECT nombreUsuario from usuarios");
            if($result->num_rows>0){
                //Por cada linea de la consulta
                while($row = $result->fetch_assoc()) {
                    //si encuentra el nombre cambio la variable booleana a true
                    if($nombre==$row['nombreUsuario']) {
                        $existe=true;
                    }
                }
            }
            //cierro la conexion
            $bd->cerrarConexion();
            return $existe;
        }

        public static function verificarContrasena($nombre,$contraseña){
            //instancio un objeto de la clase Bd 
            $bd = new Bd();
            //creo la conexion
            $bd->crearConexion();
            //compruebo si existe el usuario
            if(Usuario::buscarUsuario($nombre)){
                //encriptar contraseña
                $contraseña = md5($contraseña);
                //ejecuto la consulta
                $result=$bd->dataQuery("SELECT contraseña from usuarios where nombreUsuario='$nombre'");
                while ($row = $result->fetch_assoc()) {
                    //si las contraseñas coinciden devuelvo true; sino, false
                    if($row['contraseña'] == $contraseña){
                        return true;
                    }else{
                        return false;
                    }
                }
            }else{
                return 0;
            }
            //cierro la conexion
            $bd->cerrarConexion();
        }

        public static function haVotado($nombre){
            //instancio un objeto de la clase Bd 
            $bd = new Bd();
            //creo la conexion
            $bd->crearConexion();
            //ejecuto la consulta
            $result=$bd->dataQuery("SELECT haVotado from usuarios where nombreUsuario='$nombre'");
            while ($row = $result->fetch_assoc()) {
                //si el usuario ya ha votado devuelvo true
                if($row['haVotado'] == "1"){
                    return true;
                }else{
                    return false;
                }
            }
            //cierro la conexion
            $bd->cerrarConexion();
        }
        public static function iniciarSesion(){
            //recojo los datos del formulario
            $nombre = $_REQUEST['usuario'];
            $contraseña = $_REQUEST['contraseña'];
            //busco si existe el usuario
            if (Usuario::buscarUsuario($nombre)) {
                //verifico la contraseña
                if (Usuario::verificarContrasena($nombre, $contraseña)) {
                    //compruebo si ha votado
                    if (!Usuario::haVotado($nombre)) {
                        //arranco la sesion
                        session_start();
                        //registro el nombre en la variable de sesion
                        $_SESSION['sesionUsuario'] = $nombre;
                        //redirijo a otra pagina
                        header("Location: ./../Controladores/controladorVotacion.php");
                    } else {
                        //redirijo a otra pagina
                        header("Location: ./../Controladores/controladorHaVotado.php");
                    }  
                } else {
                    echo "<p>Contraseña incorrecta</p>";
                }
            }else{
                echo "<p>El usuario no existe</p>";
            }
        }
        public static function insertarUsuario(){
            //instancio un objeto de la clase Bd 
            $bd = new Bd();
            //creo la conexion
            $bd->crearConexion();
            //recojo los datos del formulario
            $nombre = $_REQUEST['nombre'];
            $contraseña = $_REQUEST['contraseña'];
            $contraseña2=$_REQUEST['contraseña2'];
            //compruebo si existe el usuario
            if (!Usuario::buscarUsuario($nombre)) {
                //compruebo que las contraseñas son iguales
                if ($contraseña == $contraseña2) {
                    $contraseña = md5($contraseña);
                    //ejecuto la consulta
                    $bd->dataQuery("Insert into usuarios (nombreUsuario,contraseña) values ('$nombre','$contraseña')");
                    //redirijo a otra pagina
                    header("Location: ./../Controladores/controladorInicioSesion.php");
                } else {
                    echo "<p class='msg'>Las contraseñas no coinciden</p>";
                }
            }else{
                echo "<p class='msg'>El usuario ya existe</p>";
            }
            //cierro la conexion
            $bd->cerrarConexion();  
        }
    }
?>