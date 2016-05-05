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
			$pagina = replace_logo('/\#LOGO\#/ms' ,'http://www.brandsoftheworld.com/sites/default/files/styles/logo-thumbnail/public/062012/label_beer.jpg?itok=6bP2lJu5' , $pagina);
		echo $pagina;
	}


}

?>