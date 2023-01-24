<?php
include "bd.php";
    /**
     * Clase utilizada para la manipulación y verificación de usuarios
     * 
     * @author Raúl San José <raulsj@alumnos.iesgalileo.es>
     */
    class Usuario{
        /**
         * Funcion que busca un usuario en la base de datos
         * 
         * @param mixed $nombre Nombre del usuario
         * @return bool Devuelve true en caso de que exista, sino false
         * @access public
         * @static 
         */
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
        /**
         * Función que verifica si es correcta la contraseña introducida por el usuario
         * 
         * @static
         * @access public
         * @param mixed $nombre Nombre del usuario
         * @param mixed $contrasena Contraseña introducida
         * @return bool Devuelve un booleano true si existe el usuario, sino false
         */
        
        public static function verificarContrasena($nombre,$contraseña){
            //instancio un objeto de la clase Bd 
            $bd = new Bd();
            //creo la conexion
            $bd->crearConexion();
            //compruebo si existe el usuario
            if(Usuario::buscarUsuario($nombre)){
                // variable donde recojo un booleano
                $verificar=false;
                //encriptar contraseña
                $contraseña = md5($contraseña);
                //ejecuto la consulta
                $result=$bd->dataQuery("SELECT contraseña from usuarios where nombreUsuario='$nombre'");
                while ($row = $result->fetch_assoc()) {
                    
                    //si las contraseñas coinciden verificar=true;
                    if($row['contraseña'] == $contraseña){
                        $verificar= true;
                    }
                }
            }else{
                return false;
            }
            //cierro la conexion
            $bd->cerrarConexion();
            // devuelvo el booleano
            return $verificar;
        }
        /**
         * Función que comprueba si un usuario ha realizado su voto
         * 
         * @static
         * @access public
         * @param string $nombre Nombre del usuario
         * @return bool Devuelve true si el usuario ya ha votado, sino false
         */
        public static function haVotado($nombre){
            //instancio un objeto de la clase Bd 
            $bd = new Bd();
            //creo la conexion
            $bd->crearConexion();
            //ejecuto la consulta
            $result=$bd->dataQuery("SELECT haVotado from usuarios where nombreUsuario='$nombre'");
            // recojo un booleano 
            $votado = false;
            while ($row = $result->fetch_assoc()) {
                //si el usuario ya ha votado devuelvo true
                if($row['haVotado'] == "1"){
                    $votado= true;
                }
            }
            //cierro la conexion
            $bd->cerrarConexion();
            // devuelvo el booleano
            return $votado;
        }
        /**
         * Función que inicia la sesión de un usuario
         * 
         * @static
         * @access public
         * @return void
         */
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
                    // saca el mensaje por pantalla
                    echo "<p>Contraseña incorrecta</p>";
                }
            }else{
                // saca el mensaje por pantalla
                echo "<p>El usuario no existe</p>";
            }
        }
        /**
         * Funcion que inserta un usuario en la base de datos
         * 
         * @access public
         * @static
         * @return void
         */
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
                    // saca el mensaje por pantalla
                    echo "<p class='msg'>Las contraseñas no coinciden</p>";
                }
            }else{
                // saca el mensaje por pantalla
                echo "<p class='msg'>El usuario ya existe</p>";
            }
            //cierro la conexion
            $bd->cerrarConexion();  
        }
    }
?>