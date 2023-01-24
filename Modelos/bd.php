<?php 
    /**
     * Clase que permite tanto conectarse y desconectarse, como realizar consultas a la base de datos
     * 
     * @author Raúl San José <raulsj@alumnos.iesgalileo.es>
     */
    class Bd{
        /**
         * Atributo que recoge una base de datos
         * @var mixed
         * @access private
         */
        private $bd;

        /**
         * Función que crea una conexión con una base de datos determinada
         * 
         * @return int Devuelve 0 si se ha conectado correctamente y -1 si hay errores
         * @access public
         */
        function crearConexion(){
            //creo la conexion con los parametros
            $this->bd=new mysqli("localhost","root","","votacion");
            //si hay errores devuelvo -1
            if ($this->bd->connect_errno)
                return -1;
            else
                return 0;
        }
        /**
         * Función que cierra la conexion con la base de datos
         * 
         * @access public
         * @return void
         */
        function cerrarConexion(){
            //si hay una conexion creada
            if ($this->bd)
                //cierro esa conexion
                $this->bd->close();
        }
        /**
         * Funcion que realiza una consulta a la base de datos
         * 
         * @param mixed $sql Consulta que queremos ejecutar
         * @return bool|mysqli_result Devuelve true si se han encontrado resultados y false en caso contrario
         * @access public
         */
        function dataQuery($sql) {
            //ejecuto la consulta 
            $resultado = $this->bd->query($sql);
            //devuelvo el resultado obtenido
            return $resultado;
            }
        /**
         * Funcion que sirve para manipular la base de datos
         * 
         * @access public
         * @param mixed $sql Consulta de manipulación que deseamos ejecutar
         * @return int Devuelve el numero de lineas afectadas
         */
        function dataManipulation($sql) {
            //ejecuto la consulta
            $this->bd->query($sql);
            //devuelvo el numero de lineas afectadas
            return $this->bd->affected_rows;
        }
    }
?>