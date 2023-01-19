<?php 
    class Bd{
        private $bd;
        function crearConexion(){
            //creo la conexion con los parametros
            $this->bd=new mysqli("localhost","root","","votacion");
            //si hay errores devuelvo -1
            if ($this->bd->connect_errno)
                return -1;
            else
                return 0;
        }
        function cerrarConexion(){
            //si hay una conexion creada
            if ($this->bd)
                //cierro esa conexion
                $this->bd->close();
        }
        function dataQuery($sql) {
            //ejecuto la consulta 
            $resultado = $this->bd->query($sql);
            //devuelvo el resultado obtenido
            return $resultado;
            }
        function dataManipulation($sql) {
            //ejecuto la consulta
            $this->bd->query($sql);
            //devuelvo el numero de lineas afectadas
            return $this->bd->affected_rows;
        }
    }
?>