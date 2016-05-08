<?php
require 'app/model/class.user.php';
require 'app/model/class.restaurante.php';
require 'app/model/class.proveedor.php';
//require 'app/model/class.pedido.php';
require 'app/controller/pageGenerator.php';

class mvc_controller {


//FUNCION PARA DECIDIR SI ERES PROVEEDOR/RESTAURANTE/AUN NO LOGUEADO

	function decision(){

		$usuario = new User();
		//comprobamos que se ha rellenado el login
		if (!empty($_POST)) {
					$nombre=$_POST["username"];
					//comparo el nombre del formulario con la BBDD que me devuelve el id y la pass
					$datos=$usuario->existo($nombre);	
					//var_dump($datos);
					//Si no encuentra la pass devolvera '' entonces si esta llena Y es igual a la de la BBDD
				if (!empty($datos[0]['pass'])&&($datos[0]["pass"]===$_POST["password"])) {
						//Buscamos en la BBDD si el id es Proveedor o Restaurante
						$profesion=$usuario->proveOrest($datos[0]['id']);
						//var_dump($profesion);
						//En funcion de lo que sea el id (Proveedor/Restaurante) cargamos un menu u otro
						if (isset($profesion[0]["idProveedor"])) {

							$pagina=load_page("app/views/default/indexP.php");
							$pagina = replace_logo('/\#LOGO\#/ms' ,$profesion[0]["logo"] , $pagina);
							view_page($pagina);

						}elseif(isset($profesion[0]["idRestaurante"])){
							$pagina=load_page("app/views/default/indexR.php");
							$pagina = replace_logo('/\#LOGO\#/ms' ,$profesion[0]["logo"] , $pagina);
							view_page($pagina);
						}
				}else{
					//Si la contraseña no coicide volvemos al login
					$pagina=load_page("app/views/default/login.php");
					view_page($pagina);
				}
		}else{
			//si POST esta vacio es la primera vez que entramos al login
			$pagina=load_page("app/views/default/login.php");
			view_page($pagina);
		}

	}










	//METODOS QUE MUESTRAN LAS PAGINAS PRINCIPALES DE LOS PROVEEDORES//

	function mostrarMisRestaurantes($idProveedor){
		$proveedor=new Proveedor();

		$pagina=load_template();	

		$tsArray = $proveedor->verMisRestaurantes($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 

					//carga la tabla de la seccion de m.table_univ.php
					include '/app/views/default/modules/m_misRestaurantes.php';
					$table = ob_get_clean();	


					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,"", $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,'https://logodownload.org/wp-content/uploads/2014/08/logo-Heineken.png' , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#TABLA\#/ms' ,'<h3>No existen resultados</h3>', $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,"" , $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,'https://logodownload.org/wp-content/uploads/2014/08/logo-Heineken.png' , $pagina);
	   			}		
		echo $pagina;
	}


}



?>