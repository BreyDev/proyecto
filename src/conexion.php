<?php
//nuevos cambios 
class conexion{

        private $servidor="localhost";
        private $usuario="root";
        private $contrasena="";
        private $conexion;


        public function __construct()
        {
            try {
                $this->conexion= new PDO("mysql:host=$this->servidor;dbname=album",$this->usuario,$this->contrasena);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch ( PDOException $e) {
                return "Falla de conexion".$e;
            }
        }
        public function ejecutar($sql){//Insertar,Delete o Actualizar es decir, este metodo te permite insertar datos en estos procedimientos.

            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }

        public function consultar($sql){
            $setencia=$this->conexion->prepare($sql);
            $setencia->execute();
            return $setencia->fetchAll();        
        }
}


?>