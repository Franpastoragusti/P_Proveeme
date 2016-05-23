<?php

require_once './app/controller/userController.php';
require_once './app/controller/restauranteController.php';
require_once './app/controller/proveedorController.php';
require_once './app/controller/pedidoController.php';
require_once './app/model/class.administrador.php';

class mvc_controller {


/****************************************************************************************************************************/
/*****************************************************FUNCIONES DE USUARIO***************************************************/
/****************************************************************************************************************************/
	

		function menuPrincipal($id,$logo){
			$mvcUser = new user_controller();
			$mvcUser->menuPrincipal($id,$logo);
		}

		function decision(){
			$mvcUser = new user_controller();
			$mvcUser->decision();
		}

		function controlExist($nombre){
			$mvcUser = new user_controller();
			$datos=$mvcUser->controlExist($nombre);
			return $datos;

		}

		function registroUsuario($nombre, $pass, $logo){
			$mvcUser = new user_controller();
			$mvcUser->registroUsuario($nombre, $pass, $logo);
		}

/****************************************************************************************************************************/
/*****************************************************FIN FUNCIONES USUARIO**************************************************/
/****************************************************************************************************************************/





/****************************************************************************************************************************/
/*****************************************************FUNCIONES DE PEDIDO***************************************************/
/****************************************************************************************************************************/
	
		function mostrarProductosPedido($idPedido,$id,$logo){
			$mvcPedido = new pedido_controller();
			$mvcPedido->mostrarProductosPedido($idPedido,$id,$logo);
		}

/****************************************************************************************************************************/
/*****************************************************FIN FUNCIONES DE PEDIDO************************************************/
/****************************************************************************************************************************/






/****************************************************************************************************************************/
/*****************************************************FUNCIONES DE PROVEEDOR*************************************************/
/****************************************************************************************************************************/


		function registroProveedor($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
			$mvcProveedor = new proveedor_controller();
			$mvcProveedor->registroProveedor($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion);
		}

		function mostrarMisRestaurantes($idProveedor,$logo){
			$mvcProveedor = new proveedor_controller();
			$mvcProveedor->mostrarMisRestaurantes($idProveedor,$logo);
		}

		function mostrarPedidos($idProveedor,$logo){
			$mvcProveedor = new proveedor_controller();
			$mvcProveedor->mostrarPedidos($idProveedor,$logo);
		}

		function mostrarProductos($idProveedor,$logo){
			$mvcProveedor = new proveedor_controller();
			$mvcProveedor->mostrarProductos($idProveedor,$logo);
		}


		function modificarEstadoPedido($idPedido, $estado, $hora, $fecha){
			$mvcProveedor = new proveedor_controller();
			$mvcProveedor->modificarEstadoPedido($idPedido, $estado, $hora, $fecha);
		}


		//**************FUNCIONES DE PRODUCTO************************/


		function insertarProducto($nombreProd,$medida,$idSector,$idProveedor, $precio){
			$mvcProveedor = new proveedor_controller();
			$mvcProveedor->insertarProducto($nombreProd,$medida,$idSector,$idProveedor, $precio);
		}

		function eliminarProducto($idProd, $idProveedor){
			$mvcProveedor = new proveedor_controller();
			$mvcProveedor->eliminarProducto($idProd, $idProveedor);
		}




/****************************************************************************************************************************/
/*****************************************************FIN FUNCIONES DE PROVEEDOR*********************************************/
/****************************************************************************************************************************/






/****************************************************************************************************************************/
/*****************************************************FUNCIONES DE RESTAURANTE***********************************************/
/****************************************************************************************************************************/


		function registroRestaurante($id,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
			$mvcRestaurante = new restaurante_controller();
				$mvcRestaurante->registroRestaurante($id,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion);		
		}


		function buscarProveedor($idSector,$idRestaurante,$logo){
			$mvcRestaurante = new restaurante_controller();
			$mvcRestaurante->buscarProveedor($idSector,$idRestaurante,$logo);	
		}

		function mostrarProveedores($idRestaurante,$logo){
			$mvcRestaurante = new restaurante_controller();
			$mvcRestaurante->mostrarProveedores($idRestaurante,$logo);
		}

		function mostrarPedidosRestaurante($idRestaurante,$logo){
			$mvcRestaurante = new restaurante_controller();
			$mvcRestaurante->mostrarPedidosRestaurante($idRestaurante,$logo);
		}

		function buscarIdPedido(){
			$mvcRestaurante = new restaurante_controller();
			$idPedido=$mvcRestaurante-> buscarIdPedido();
			return $idPedido;
		}
		function insertarPedido(){
			$mvcRestaurante = new restaurante_controller();
			$confirmacion=$mvcRestaurante->insertarPedido();
			return $confirmacion;
		}


		function detectarProveedor($nombreProveedor){
			$mvcRestaurante = new restaurante_controller();
			$idProveedor=$mvcRestaurante->detectarProveedor($nombreProveedor);
			return $idProveedor;
		}


		function insertarProcesadoPedido($idPedido,$idRestaurante,$idProveedor){
			$mvcRestaurante = new restaurante_controller();
			$procesado=$mvcRestaurante->insertarProcesadoPedido($idPedido,$idRestaurante,$idProveedor);
			return $procesado;
		}

		function idsProductosProveedor($idProveedor){
			$mvcRestaurante = new restaurante_controller();
			$vectorProductos=$mvcRestaurante->idsProductosProveedor($idProveedor);
			return $vectorProductos;
		}

		function insertarContenidoPedido($idPedido,$vectorProductos,$cantidades){
			$mvcRestaurante = new restaurante_controller();
			$confirmPedido=$mvcRestaurante->insertarContenidoPedido($idPedido,$vectorProductos,$cantidades);
			return $confirmPedido;
		}

		function productosProveedor($nombreProveedor,$idRestaurante,$logo){
			$mvcRestaurante = new restaurante_controller();
			$mvcRestaurante->productosProveedor($nombreProveedor,$idRestaurante,$logo);

		}
		function hacerPedido($idRestaurante,$nombreProveedor,$cantidades,$logo){
			$mvcRestaurante = new restaurante_controller();
			$mvcRestaurante->hacerPedido($idRestaurante,$nombreProveedor,$cantidades,$logo);
		}


/****************************************************************************************************************************/
/*****************************************************FIN FUNCIONES DE RESTAURANTE***********************************************/
/****************************************************************************************************************************/



		function introducirInfo(){					
			$pagina = load_page('app/views/default/modules/m_creacioncuenta.php');
			view_page($pagina);
		}


/****************************************************************************************************************************/
/*****************************************************FUNCIONES DE ADMINISTRADOR***********************************************/
/****************************************************************************************************************************/

		function admin($user,$password){
		    $adServer = "ldap://10.2.72.199";	
			var_dump($_POST);
		    $ldap = ldap_connect($adServer);
		    $username = $user;    
		    $password = $password;
		  
		    $ldaprdn = 'ProveemeWServer' . "\\" . $username;
		    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
		    $bind = @ldap_bind($ldap, $ldaprdn, $password);
		    if ($bind) {	

		    	$pagina=load_page("app/views/default/indexAdmin.php");
				view_page($pagina);  

		    } else {
		    	$pagina=load_page("app/views/default/login.php");
				$error=load_page("app/views/default/modules/m_Error.php");
				$pagina = replace_error("/listo/" , $error, $pagina);
				view_page($pagina);
		    }
	
		    ldap_close();
		}



		function mostrarTodosPedidos(){
			$admin=new Admin();
			
			$pagina=load_template();	
			$notFound=load_page('./app/views/default/modules/m_noResultado.php');
			$botones=load_page('./app/views/default/modules/m_botonesVacios.php');
			$tsArray = $admin->verPedidos();			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
			    	//var_dump($tsArray);
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_pedidosProveedor.php';
					$table = ob_get_clean();	

					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,'http://www.emprendepyme.net/wp-content/uploads/2014/11/administrador.jpg' , $pagina);
			   	}else{

				   		$pagina = replace_content('/\#CONTENT\#/ms' ,$notFound, $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,'http://www.emprendepyme.net/wp-content/uploads/2014/11/administrador.jpg' , $pagina);
	   			}		
			view_page($pagina);



			var_dump($datos);
		}
/****************************************************************************************************************************/
/*****************************************************FIN FUNCIONES DE ADMINISTRADOR*****************************************/
/****************************************************************************************************************************/
}
	

?>