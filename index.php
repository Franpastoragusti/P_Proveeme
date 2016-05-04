<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require '/app/controller/mvc.Controller.php';

$mvc = new mvc_controller();

	$mvc->mostrarMisRestaurantes();	

?>