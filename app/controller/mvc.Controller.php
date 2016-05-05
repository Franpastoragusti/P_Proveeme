<?php
require 'app/model/class.user.php';
require 'app/model/class.restaurante.php';
//require 'app/model/class.proveedor.php';
//require 'app/model/class.pedido.php';
require 'app/controller/pageGenerator.php';

class mvc_controller {


	//METODOS QUE MUESTRAN LAS PAGINAS PRINCIPALES DE LOS PROVEEDORES//

	function mostrarMisRestaurantes(){
		$pagina=load_template('PROVEEDOR');				
		$html = load_page('app/views/default/modules/m_misRestaurantes.php');
			$pagina = replace_content('/\#TABLA\#/ms' ,$html , $pagina);
			$pagina = replace_botones('/\#BOTONES\#/ms' ,'' , $pagina);
			$pagina = replace_logo('/\#LOGO\#/ms' ,'https://logodownload.org/wp-content/uploads/2014/08/logo-Heineken.png' , $pagina);
		echo $pagina;
	}


}

?>