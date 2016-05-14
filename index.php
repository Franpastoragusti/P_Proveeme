<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require './app/controller/mvc.Controller.php';

$mvc = new mvc_controller();
	session_start();
	var_dump($_SESSION);

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
	
	}elseif ( $_GET['action'] == 'RLProveedores' ){

		$mvc->mostrarProveedores($_SESSION['id'],$_SESSION['logo']);
	}elseif ( $_GET['action'] == 'MenuPrincipal' ){

		$datos=$mvc->menuPrincipal($_SESSION['id'],$_SESSION['logo']);

	}elseif ( $_GET['action'] == 'RLPedido' ){

		$mvc->mostrarPedidosRestaurante($_SESSION['id'],$_SESSION['logo']);





	}elseif (isset($_POST['nombreProd']) && 
			isset($_POST['medida']) &&  
			isset($_POST['idSector'])){
		
		$mvc->insertarProducto($_POST['nombreProd'],$_POST['medida'],$_POST['idSector'],$_SESSION['id'], $_POST['precio']);

		$mvc->mostrarProductos($_SESSION['id'],$_SESSION['logo']);
	


	}elseif (isset($_POST['idProducto'])){

		$mvc->eliminarProducto($_POST['idProducto'], $_SESSION['id']);
		$mvc->mostrarProductos($_SESSION['id'],$_SESSION['logo']);

	}elseif (isset($_POST['estadoPedido'])){

		$mvc->modificarEstadoPedido($_SESSION['id'], $_POST['estadoPedido'], $_POST['hora'], $_POST['fecha']);
		$mvc->mostrarPedidos($_SESSION['id'],$_SESSION['logo']);





	}elseif ( $_GET['action'] == 'AddProducto' ){

		$mvc->addProducto($_SESSION['id'],$_SESSION['logo']);


	}elseif (isset($_GET['sector'])){

		switch ($_GET['sector']) {
			case '1':
				$mvc->buscarProveedor(1,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '2':
				$mvc->buscarProveedor(2,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '3':
				$mvc->buscarProveedor(3,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '4':
				$mvc->buscarProveedor(4,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '5':
				$mvc->buscarProveedor(5,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '6':
				$mvc->buscarProveedor(6,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '7':
				$mvc->buscarProveedor(7,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '8':
				$mvc->buscarProveedor(8,$_SESSION['id'],$_SESSION['logo']);
				break;
			case '9':
				$mvc->buscarProveedor(9,$_SESSION['id'],$_SESSION['logo']);
				break;
			default:
				$mvc->buscarProveedor(10,$_SESSION['id'],$_SESSION['logo']);
				break;
		}

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