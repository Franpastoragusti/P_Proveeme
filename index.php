<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require_once './app/controller/mvc.Controller.php';
	require_once "./app/lib/recaptchalib.php";
	$secret = "6Lc0pB8TAAAAANveSGRDa0p-DF5iQJMHf7-6EEco";
	$response = null;

$mvc = new mvc_controller();
	//session_destroy();
	session_start();


/****************************************************************************************************************************/
/**********************************************METODOS CON GET***************************************************************/
/****************************************************************************************************************************/

	if( $_GET['action'] == 'crearCuenta' ) //muestra el modulo de crear cuenta
	{	
		$mvc->introducirInfo();	

	}elseif ( $_GET['action'] == 'PMRestaurantes' ) //Muestra los restaurantes que han comerciado con el proveedor
	{
		$mvc->mostrarMisRestaurantes($_SESSION['id'],$_SESSION['logo']);
		
	}elseif ( $_GET['action'] == 'PLPedido' ){ //Muestra la lista de pedidos de un proveedor

		$mvc->mostrarPedidos($_SESSION['id'],$_SESSION['logo']);
	

	}elseif ( $_GET['action'] == 'PLProductos' ){ //Muestra la lista de productos de un proveedor

		$mvc->mostrarProductos($_SESSION['id'],$_SESSION['logo']);
	
	}elseif ( $_GET['action'] == 'RLProveedores' ){ //Muestra la lista con todos los proveedores existentes

		$mvc->mostrarProveedores($_SESSION['id'],$_SESSION['logo']);

	}elseif ( $_GET['action'] == 'MenuPrincipal' ){	//Permite retroceder al menu principal del restaurante o del proveedor

		$mvc->menuPrincipal($_SESSION['id'],$_SESSION['logo']);

	}elseif ( $_GET['action'] == 'RLPedido' ){ //Muestra la lista de pedidos de un restaurante

		$mvc->mostrarPedidosRestaurante($_SESSION['id'],$_SESSION['logo']);

	}elseif ( $_GET['action'] == 'TPedidos' ){ //Todos los productos en el Administrador

		$mvc->mostrarTodosPedidos();

	}elseif (isset($_GET['sector'])){ //Realiza la busqueda de proveedores segun si tienen productos de dicho tipo

		switch ($_GET['sector']) {

			case '1':
				$mvc->buscarProveedor(1,$_SESSION['id'],$_SESSION['logo']);
				break;

			case '2':
				$mvc->buscarProveedor(2,$_SESSION['id'],$_SESSION['logo']);
				break;

			case '3':
				$mvc->buscarProveedor(3,$_SESSION['decisionid'],$_SESSION['logo']);
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
		}elseif (isset($_POST['admin'])){	//Permite retroceder al menu principal del restaurante o del proveedor
				$mvc->admin($_POST["username"],$_POST["password"]);



/****************************************************************************************************************************/
/**********************************************METODOS CON POST***************************************************************/
/****************************************************************************************************************************/
	}elseif (isset($_POST['idProducto'])){ //Elimina un producto de la lista de productos de un proveedor

		$mvc->eliminarProducto($_POST['idProducto'], $_SESSION['id']);
		$mvc->mostrarProductos($_SESSION['id'],$_SESSION['logo']);

	}elseif (isset($_POST['estadoPedido'])&& //Da la opcion a un proveedor de aceptar/cancelar un pedido y establecer una hora y fecha de entrega
			isset($_POST['idPedido'])){

		$mvc->modificarEstadoPedido($_POST['idPedido'], $_POST['estadoPedido'], $_POST['hora'], $_POST['fecha']);
		$mvc->mostrarPedidos($_SESSION['id'],$_SESSION['logo']);


	}elseif (isset($_POST['idPedidoBuscado'])){ //Muestra los roductos de un pedido

		$mvc->mostrarProductosPedido($_POST['idPedidoBuscado'],$_SESSION['id'],$_SESSION['logo']);


	}elseif (isset($_POST['cantidades'][0])){ //Crear un pedido nuevo
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$pagina=load_template();	
		$botones=load_page('./app/views/default/modules/m_botonesListaPedidosR.php');
		if ($confirm=$mvc->insertarPedido()) {
			$pedido=$mvc->buscarIdPedido();
			$proveedor=$mvc->detectarProveedor($_SESSION['nombreProveedor']);
			$procesado=$mvc->insertarProcesadoPedido($pedido[0]['idPedido'],$_SESSION['id'],$proveedor[0]['id']);
			$vectorProductos=$mvc->idsProductosProveedor($proveedor[0]['id']);
			$confirmPedido=$mvc->insertarContenidoPedido($pedido[0]['idPedido'],$vectorProductos,$_POST['cantidades']);
			$mvc->mostrarPedidosRestaurante($_SESSION['id'],$_SESSION['logo']);
		}else{
			$pagina = replace_content('/\#CONTENT\#/ms' ,$notFound, $pagina);	
			$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
			$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
		}

	}elseif ( isset($_POST['nombreProd'])&& //Inserta un producto en la lista de productos de un proveedor
			isset($_POST['medida'])&&
			isset($_POST['idSector'])&&
			isset($_POST['precio'])){

		$mvc->insertarProducto($_POST['nombreProd'],$_POST['medida'],$_POST['idSector'],$_SESSION['id'], $_POST['precio']);
		$mvc->mostrarProductos($_SESSION['id'],$_SESSION['logo']);


	}elseif (isset($_POST['idProveedorSeleccionado'])){ //Muestra a un restaurante el modulo de os productos que tiene un proveedor y le permite modificar las cantidades del producto

		$mvc->productosProveedor($_POST['idProveedorSeleccionado'],$_SESSION['id'],$_SESSION['logo']);


	}elseif (isset($_POST['username']) &&  //Registra un nuevo usuario
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


				$reCaptcha = new ReCaptcha($secret);
					if ($_POST["g-recaptcha-response"]) {
					$response = $reCaptcha->verifyResponse(
				    $_SERVER["REMOTE_ADDR"],
				    $_POST["g-recaptcha-response"]);
					}
				if ($response != null && $response->success) {

					if ($_POST['password']===$_POST['confirmPassword']) {
								//encriptamos la contraseña
								$encripKey=md5($_POST['password']);
								$mvc->registroUsuario($_POST['username'], $encripKey, $_POST["logo"]);
								$datos=$mvc->controlExist($_POST['username']);
								var_dump($datos);
								echo "holaaaa";
								if ($_POST['tipoUsuario']=='Restaurante') {
										//inserta un restaurante
										$mvc->registroRestaurante($datos[0]['id'],$_POST['empresa'],$_POST['cif'],$_POST['telefono'],$_POST['email'],$_POST['provincia'],$_POST['localidad'],$_POST['cp'],$_POST['calle'],$_POST['numero'],$_POST['descripcion']);

								}elseif ($_POST['tipoUsuario']=='Proveedor') {
										//inserta un proveedor
										$mvc->registroProveedor($datos[0]['id'],$_POST['idSector'],$_POST['pedidoMin'],$_POST['empresa'],$_POST['cif'],$_POST['telefono'],$_POST['email'],$_POST['provincia'],$_POST['localidad'],$_POST['cp'],$_POST['calle'],$_POST['numero'],$_POST['descripcion']);
								}
										
					}else{
						$pagina=load_page("app/views/default/login.php");
						$error=load_page("app/views/default/modules/m_Error.php");
						$pagina = replace_error("/listo/" , $error, $pagina);
						view_page($pagina);
					}
				}else{
		 		 	$pagina=load_page("app/views/default/login.php");
					$error=load_page("app/views/default/modules/m_Error.php");
					$pagina = replace_error("/listo/" , $error, $pagina);
					view_page($pagina);
	 			}

	}else{ 

       	$mvc->decision();
 		
	}
?>