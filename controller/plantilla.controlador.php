<?php

class ControladorPlantilla{
    /*
    LLAMADO A LA PLANTILLA
    */
    public function plantilla(){

        include "view/plantilla.php";
    }
    /*
    LLAMADO A LOS ESTILOS DINAMICOS
    */
    public function ctrEstiloPlantilla(){
        $tabla = "plantilla";
        $respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);
        return $respuesta;
    }
}