<?php

//require 'app/model/class.user.php';
//require 'app/model/class.restaurante.php';
require_once './app/model/class.proveedor.php';
//require 'app/model/class.pedido.php';
require_once './app/controller/pageGenerator.php';

class proveedor_controller {

	//METODOS QUE MUESTRAN LAS PAGINAS PRINCIPALES DE LOS PROVEEDORES//

	function mostrarMisRestaurantes($idProveedor,$logo){
		$proveedor=new Proveedor();

		$pagina=load_template();	
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$botones=load_page('./app/views/default/modules/m_botonesVacios.php');
		$tsArray = $proveedor->verMisRestaurantes($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
			    	//var_dump($tsArray);
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_misRestaurantes.php';
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

	function mostrarPedidos($idProveedor,$logo){
		$proveedor=new Proveedor();
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$pagina=load_template();	
		$botones=load_page('./app/views/default/modules/m_botonesMisPedidosP.php');
		$tsArray = $proveedor->verListaPedidos($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
					//var_dump($_SESSION);
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_pedidosProveedor.php';
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

	function mostrarProductos($idProveedor,$logo){
		$proveedor=new Proveedor();
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$pagina=load_template();	
		$botones=load_page("app/views/default/modules/m_botonesMisProductos.php");
		$tsArray = $proveedor->verProductos($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_listaProductos.php';
					$table = ob_get_clean();
					//realiza el parseado 
					//var_dump($tsArray);
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



	function insertarProducto($nombreProd,$medida,$idSector,$idProveedor, $precio){
		$proveedor=new Proveedor();
		
		$pagina=load_template();
		$tsArray=$proveedor->detectaProducto($nombreProd,$medida);
		
		if($tsArray!=''){

			if ($proveedor->addProductoTablaProd_Prov($tsArray[0]['idProducto'], $idProveedor, $precio)) {
				
			}

		}else{

			if ($proveedor->addProductoTablaProd($idSector, $nombreProd, $medida)) {
				
			}
			$idProducto=$proveedor->detectaProducto($nombreProd,$medida);
			if ($proveedor->addProductoTablaProd_Prov($idProducto[0]['idProducto'], $idProveedor, $precio)) {
				
			}
			
		}

	}

	function eliminarProducto($idProd, $idProveedor){
		$proveedor=new Proveedor();

		$pagina=load_template();
		$proveedor->eliminarProducto($idProd,$idProveedor);

	}




		function modificarEstadoPedido($idPedido, $estado, $hora, $fecha){
			$proveedor=new Proveedor();

			$pagina=load_template();
			if ($proveedor->modificarEstadoPedido($idPedido, $estado, $hora, $fecha)){
			}else{
				echo "error al insertar";
			}
	}


	function registroProveedor($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
				$proveedor=new Proveedor();
				$pagina=load_page("app/views/default/login.php");
				$Proveedor->registro($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion);
				view_page($pagina);
		}



	function modificarCuenta($idProveedor){
		$proveedor=new Proveedor();
		$pagina=load_page("app/views/default/modules/m_modificarcuenta.php");
		$data=$proveedor->misDatos($idProveedor);
		//var_dump($data);
		$var= $data[0]['logo'];
		
		view_page($pagina);
		//$proveedor->modificarCuenta($data[0]['idProveedor'],$data[0]['nombreUsuario'],$data[0]['logo'],$data[0]['idSector'], $data[0]['pedidoMinimo'],$data[0]['cif'], $data[0]['nombreEmpresa'], $data[0]['email'],$data[0]['telefono'], $data[0]['descripcion'],$data[0]['provincia'], $data[0]['localidad'], $data[0]['calle'], $data[0]['numero'], $data[0]['cp']);
		//$var=$data[0]['nombreUsuario'];
		
	}


}
?>