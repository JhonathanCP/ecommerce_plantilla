<?php
require_once "controller/productos.controlador.php";
require_once "controller/plantilla.controlador.php";
require_once "controller/slide.controlador.php";

require_once "model/productos.modelo.php";
require_once "model/plantilla.modelo.php";
require_once "model/rutas.php";
require_once "model/slide.modelo.php";

//Creamos un objeto y llamamos a su método
$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();
