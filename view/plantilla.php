<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
    minumum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="TIENDA VIRTUAl">
    <meta name="description" content="Lorem ipsum dolor sit amet consectetur, 
    adipisicing elit. Ipsam blanditiis illo assumenda quo quis nesciunt veritatis 
    mollitia, sapiente ut libero soluta iste eum animi vero alias aliquid hic reiciendis ad!">
    <meta name="keywords" content="Lorem, ipsum, dolor, sit, iste">

    <title>TIENDA VIRTUAL</title>

	<?php
	
		$servidor = Ruta::ctrRutaServidor();

        $icono = ControladorPlantilla::ctrEstiloPlantilla();
    
        echo '<link rel="icon" href="'.$servidor.$icono["icono"].'">';
    
        //MANTENER LA RUTA FIJA DEL PROYECTO

        $url =  Ruta::ctrRuta();        
        
    ?>
	
	<!--========================
	PLUGINS CSS
	=========================-->

    <link rel="stylesheet" href="<?php echo $url; ?>view/css/plugins/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>view/css/plugins/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">
	
	<!--========================
	HOJAS DE ESTILO LINKED
	=========================-->

    <link rel="stylesheet" href="<?php echo $url; ?>view/css/plantilla.css">

    <link rel="stylesheet" href="<?php echo $url; ?>view/css/cabezote.css">

    <link rel="stylesheet" href="<?php echo $url; ?>view/css/slide.css">

	<link rel="stylesheet" href="<?php echo $url; ?>view/css/productos.css">

	<!--========================
	PLUGINS JS
	=========================-->

    <script src="<?php echo $url; ?>view/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>view/js/plugins/bootstrap.min.js"></script>
	
	<script src="<?php echo $url; ?>view/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>view/js/plugins/jquery.scrollUp.js"></script>
</head>
<body>

<?php

/*=============================================
CABEZOTE
=============================================*/

include "modulos/cabezote.php";

/*=============================================
CONTENIDO DINÁMICO
=============================================*/

$rutas = array();
$ruta = null;
$infoProducto = null;

if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);

	$item = "ruta";
	$valor =  $rutas[0];

	/*=============================================
	URL'S AMIGABLES DE CATEGORÍAS
	=============================================*/

	$rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

	if(is_array($rutaCategorias) && $rutas[0] == $rutaCategorias["ruta"]){

		$ruta = $rutas[0];

	}

	/*=============================================
	URL'S AMIGABLES DE SUBCATEGORÍAS
	=============================================*/

	$rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

	foreach ($rutaSubCategorias as $key => $value) {
		
		if(is_array($value) && $rutas[0] == $value["ruta"]){

			$ruta = $rutas[0];

		}

	}

	/*=============================================
	URL'S AMIGABLES DE PRODUCTOS
	=============================================*/

	$rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);
	
	if(is_array($rutaProductos) && $rutas[0] == $rutaProductos["ruta"]){

		$infoProducto = $rutas[0];

	}

	/*=============================================
	LISTA BLANCA DE URL'S AMIGABLES
	=============================================*/

	if($ruta != null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){

		include "modulos/productos.php";

	}elseif($infoProducto!=null){

		include "modulos/infoproducto.php";

	}
	else{

		include "modulos/error404.php";

	}

}
else{
	include "modulos/slide.php";
	include "modulos/destacados.php";
}

?>
<input type="hidden" value="<?php echo $url; ?>" id="ruta">
<!--========================
	JS PERSONALIZADO
=========================-->

<script src="<?php echo $url; ?>view/js/cabezote.js"></script>

<script src="<?php echo $url; ?>view/js/plantilla.js"></script>

<script src="<?php echo $url; ?>view/js/slide.js"></script>

</body>
</html>