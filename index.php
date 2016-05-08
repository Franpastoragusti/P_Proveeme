<?php
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require './app/controller/mvc.Controller.php';

$mvc = new mvc_controller();

	//$mvc->mostrarMisRestaurantes(5,1);	

	if( $_GET['action'] == 'crearCuenta' ) //muestra el modulo del buscador
	{	
		$mvc->introducirInfo();	
	}elseif (isset($_POST['username']) && 
			isset($_POST['password']) && 
			isset($_POST['confirmPassword']) && 
			isset($_POST['tipoUsuario']) && 
			isset($_POST['empresa'])&& 
			isset($_POST['cif']) && 
			isset($_POST['telefono']) && 
			isset($_POST['email']) && 
			isset($_POST['provincia']) && 
			isset($_POST['localidad']) && 
			isset($_POST['cp']) && 
			isset($_POST['calle']) && 
			isset($_POST['numero'])){

		/*if ($_POST['password']===$_POST['confirmPassword']) {
			//Insertar usuario nuevo
			if ($tipoUsuario=='Restaurante') {
				//inserta un restaurante
				$mvc->altaRestaurante($_POST['username'],$_POST['password'],$_POST['tipoUsuario'],$_POST['empresa'],$_POST['cif'],$_POST['telefono'],$_POST['email'],$_POST['provincia'],$_POST['localidad'],$_POST['cp'],$_POST['calle'],$_POST['numero'],$_POST['descripcion']);

			}elseif ($tipoUsuario=='Proveedor') {
				//inserta un proveedor
				$mvc->altaProveedor($_POST['username'],$_POST['password'],$_POST['tipoUsuario'],$_POST['sector'],$_POST['pedidoMin'],$_POST['empresa'],$_POST['cif'],$_POST['telefono'],$_POST['email'],$_POST['provincia'],$_POST['localidad'],$_POST['cp'],$_POST['calle'],$_POST['numero'],$_POST['descripcion']);
			}
		}else{*/
			$_POST= array();
			$mvc->decision();
		//}
	}else{
		$mvc->decision();
	}

?>