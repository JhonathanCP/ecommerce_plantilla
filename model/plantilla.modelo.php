<?php

require_once "conexion.php";

class modeloPlantilla{
    //--static porque recibe parámetros--//
    static public function mdlEstiloPlantilla($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
        $stmt = null;
    }
}