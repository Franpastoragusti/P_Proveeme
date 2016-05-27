<?php

//require 'app/model/class.user.php';
require_once './app/model/class.restaurante.php';
//require 'app/model/class.proveedor.php';
//require 'app/model/class.pedido.php';
require_once './app/controller/pageGenerator.php';

class restaurante_controller {

	function buscarProveedor($idSector,$idRestaurante,$logo){
		$restaurante = new Restaurante();	
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$pagina=load_template();
		$botones=load_page('./app/views/default/modules/m_botonesMisProveedores.php');
		$tsArray = $restaurante->verProveedoresPorSector($idSector);	
		//var_dump($tsArray);		   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 

					include './app/views/default/modules/m_listaProveedorR.php';
					$table = ob_get_clean();	

					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#CONTENT\#/ms' ,$notFound, $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
	   			}		
		view_page($pagina);
	}

	function mostrarProveedores($idRestaurante,$logo){
		$restaurante=new Restaurante();
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$pagina=load_template();	
		$botones=load_page('./app/views/default/modules/m_botonesMisProveedores.php');
		$tsArray = $restaurante->verListaProveedores($idRestaurante);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
	
					include './app/views/default/modules/m_listaProveedorR.php';
					$table = ob_get_clean();	
					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#CONTENT\#/ms' ,$notFound, $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
	   			}		
		view_page($pagina);
	}

	function mostrarPedidosRestaurante($idRestaurante,$logo){
			$restaurante=new Restaurante();
			$notFound=load_page('./app/views/default/modules/m_noResultado.php');
			$pagina=load_template();	
			$botones=load_page('./app/views/default/modules/m_botonesListaPedidosR.php');

			$tsArray = $restaurante->verListaPedidos($idRestaurante);			   
				    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
						//var_dump($tsArray);
			
						include './app/views/default/modules/m_pedidosRestaurante.php';
						$table = ob_get_clean();	
						//realiza el parseado 
							$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
							$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
							$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
				   	}else{
				   		$pagina = replace_content('/\#CONTENT\#/ms' ,$notFound, $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
		   			}		
			view_page($pagina);
	}


	function productosProveedor($nombreProveedor,$idRestaurante,$logo){
		$restaurante=new Restaurante();
	
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$tsArray=$restaurante->verProductosProveedor($nombreProveedor);
		$pagina=load_template();
		$botones=load_page('./app/views/default/modules/m_botonesListaPedidosR.php');
		 //var_dump($tsArray);
		 if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
						
		
		 				$_SESSION['nombreProveedor']=$tsArray[0]['nombreEmpresa'];
						include './app/views/default/modules/m_elegirProductos.php';
						$table = ob_get_clean();	
						$botones=load_page('./app/views/default/modules/m_botonesVacios.php');
						//realiza el parseado 
							$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
							$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
							$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
				   	}else{
				   		$pagina = replace_content('/\#CONTENT\#/ms' ,$notFound, $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
		   			}		
		   				//var_dump($_SESSION);
			view_page($pagina);

	}


	function buscarIdPedido(){
	$restaurante=new Restaurante();
	$idPedido=$restaurante->detectarPedido();

	return $idPedido;
	}

	function insertarPedido(){
	$restaurante=new Restaurante();
	$confirmacion=$restaurante->insertarPedido();
	return $confirmacion;
	}


	function detectarProveedor($nombreProveedor){
	$restaurante=new Restaurante();
	$idProveedor=$restaurante->detectarProveedor($nombreProveedor);
	return $idProveedor;
	}


	function insertarProcesadoPedido($idPedido,$idRestaurante,$idProveedor){
	$restaurante=new Restaurante();
	$procesado=$restaurante->insertarProcesadoPedido($idPedido,$idRestaurante,$idProveedor);
	//var_dump($procesado);
	return $procesado;
	}

	function idsProductosProveedor($idProveedor){
	$restaurante=new Restaurante();
	$vectorProductos=$restaurante->idsProductosProveedor($idProveedor);
	//var_dump($vectorProductos);
	return $vectorProductos;

	}

	function insertarContenidoPedido($idPedido,$vectorProductos,$cantidades){
	$restaurante=new Restaurante();
	$confirmPedido=$restaurante->insertarContenidoPedido($idPedido,$vectorProductos,$cantidades);
	return $confirmPedido;
	}

	function registroRestaurante($id,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
			$Restaurante=new Restaurante();
			$pagina=load_page("app/views/default/login.php");
			$Restaurante->registro($id,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion);		
			view_page($pagina);			
	}


}







