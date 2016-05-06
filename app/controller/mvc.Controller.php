<?php
require 'app/model/class.user.php';
require 'app/model/class.restaurante.php';
require 'app/model/class.proveedor.php';
//require 'app/model/class.pedido.php';
require 'app/controller/pageGenerator.php';

class mvc_controller {


	//METODOS QUE MUESTRAN LAS PAGINAS PRINCIPALES DE LOS PROVEEDORES//

	function mostrarMisRestaurantes($idProveedor){
		$proveedor=new Proveedor();

		$pagina=load_template('PROVEEDOR');	

		$tsArray = $proveedor->verMisRestaurantes($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 

					//carga la tabla de la seccion de m.table_univ.php
					include '/app/views/default/modules/m_misRestaurantes.php';
					$table = ob_get_clean();	
					//realiza el parseado 
						$pagina = replace_content('/\#TABLA\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,'' , $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,'https://logodownload.org/wp-content/uploads/2014/08/logo-Heineken.png' , $pagina);
			   	}else{
				   			$pagina = replace_content('/\#TABLA\#/ms' ,'<h3>No existen resultados</h3>', $pagina);	
				   			$pagina = replace_botones('/\#BOTONES\#/ms' ,'' , $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,'https://logodownload.org/wp-content/uploads/2014/08/logo-Heineken.png' , $pagina);
	   			}		
		echo $pagina;
	}


}

?>