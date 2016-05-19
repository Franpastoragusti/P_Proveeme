<?php

require_once './app/model/class.user.php';
//require 'app/model/class.restaurante.php';
//require 'app/model/class.proveedor.php';
require_once './app/model/class.pedido.php';
require_once './app/controller/pageGenerator.php';

class pedido_controller {


	function mostrarProductosPedido($idPedido,$id,$logo){
		$pedido=new Pedido();
		$notFound=load_page('./app/views/default/modules/m_noResultado.php');
		$usuario = new User();
		$datos=$usuario->existo($nombre);
		$profesion=$usuario->proveOrest($id);

		$pagina=load_template();
		$tsArray = $pedido->verProductosPedido($idPedido,$id);	
		//var_dump($tsArray); 
		if (isset($profesion[0]["idProveedor"])) {
			$botones=load_page('./app/views/default/modules/m_botonesMisPedidosP.php');
		}elseif(isset($profesion[0]["idRestaurante"])){
			$botones=load_page('./app/views/default/modules/m_botonesListaPedidosR.php');
		}

				    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
						//var_dump($tsArray);
						//carga la tabla de la seccion de m.table_univ.php

						include './app/views/default/modules/m_productosPedido.php';
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
}