<?php 
    class Bd{
        private $bd;
        function crearConexion(){
            $this->bd=new mysqli("localhost","root","","votacion");
            
            if ($this->bd->connect_errno)
                return -1;
            else
                return 0;
        }
        function cerrarConexion(){
            if ($this->bd)
                $this->bd->close();
        }
        function dataQuery($sql) {
            $resultado = $this->bd->query($sql);
            return $resultado;
            }
        function dataManipulation($sql) {
            $this->bd->query($sql);
            return $this->bd->affected_rows;
        }
    }
?>