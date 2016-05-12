<?php

	require './app/controller/mvc.Controller.php';

$mvc = new mvc_controller();
	session_start();

	if( $_GET['action'] == 'crearCuenta' ) //muestra el modulo del buscador
	{	
		$mvc->introducirInfo();	

	}elseif ( $_GET['action'] == 'PMRestaurantes' ) 
	{
		$mvc->mostrarMisRestaurantes($_SESSION['id'],$_SESSION['logo']);
		//var_dump($_SESSION);
		//$_SESSION está vacia 
		
	}elseif ( $_GET['action'] == 'PLPedido' ){

		$mvc->mostrarPedidos($_SESSION['id'],$_SESSION['logo']);
	

	}elseif ( $_GET['action'] == 'PLProductos' ){

		$mvc->mostrarProductos($_SESSION['id'],$_SESSION['logo']);
	


	}elseif (isset($_POST['username']) && 
			isset($_POST['password']) && 
			isset($_POST['confirmPassword']) && 
			isset($_POST['tipoUsuario']) && 
			isset($_POST['empresa'])&& 
			isset($_POST['cif']) && 
			isset($_POST['telefono']) && 
			isset($_POST['email']) && 
			isset($_POST['logo']) &&
			isset($_POST['provincia']) && 
			isset($_POST['localidad']) && 
			isset($_POST['cp']) && 
			isset($_POST['calle']) && 
			isset($_POST['numero'])){

	if ($_POST['password']===$_POST['confirmPassword']) {
				//encriptamos la contraseña
				$encripKey=md5($_POST['password']);

				//Insertar usuario nuevo
				$mvc->registroUsuario($_POST['username'], $encripKey, $_POST["logo"]);
				$datos=$mvc->controlExist($_POST['username']);
				var_dump($datos);
						
				if ($_POST['tipoUsuario']=='Restaurante') {
						//inserta un restaurante
						$mvc->registroRestaurante($datos[0]['id'],$_POST['empresa'],$_POST['cif'],$_POST['telefono'],$_POST['email'],$_POST['provincia'],$_POST['localidad'],$_POST['cp'],$_POST['calle'],$_POST['numero'],$_POST['descripcion']);

				}elseif ($_POST['tipoUsuario']=='Proveedor') {
						//inserta un proveedor
						$mvc->registroProveedor($datos[0]['id'],$_POST['idSector'],$_POST['pedidoMin'],$_POST['empresa'],$_POST['cif'],$_POST['telefono'],$_POST['email'],$_POST['provincia'],$_POST['localidad'],$_POST['cp'],$_POST['calle'],$_POST['numero'],$_POST['descripcion']);
				}
						
	}else{
		$_POST= array();
		$mvc->decision();
	}
	}else{
		
		$mvc->decision();
	}
?>