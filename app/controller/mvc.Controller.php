<?php

require 'app/model/class.user.php';
require 'app/model/class.restaurante.php';
require 'app/model/class.proveedor.php';
//require 'app/model/class.pedido.php';
require 'app/controller/pageGenerator.php';

class mvc_controller {


/***************FUNCION PARA DECIDIR SI ERES PROVEEDOR/RESTAURANTE/AUN NO LOGUEADO***********/

	function menuPrincipal($id,$logo){
		$usuario = new User();
		$datos=$usuario->existo($nombre);
		$profesion=$usuario->proveOrest($id);
		var_dump($profesion);
		var_dump($_SESSION);
		if (isset($profesion[0]["idProveedor"])) {

				$pagina=load_page("app/views/default/indexP.php");
				$pagina = replace_logo('/\#LOGO\#/ms' ,$_SESSION["logo"] , $pagina);
				view_page($pagina);

		}elseif(isset($profesion[0]["idRestaurante"])){
				$pagina=load_page("app/views/default/indexR.php");
				$pagina = replace_logo('/\#LOGO\#/ms' ,$_SESSION["logo"] , $pagina);
				view_page($pagina);
		}
	}
/********************************************************************************************/

	function decision(){
		
		$usuario = new User();
		//comprobamos que se ha rellenado el login
		if (!empty($_POST)) {
					$nombre=$_POST["username"];
					//comparo el nombre del formulario con la BBDD que me devuelve el id y la pass
					$datos=$usuario->existo($nombre);	
					//var_dump($datos);
					//Si no encuentra la pass devolvera '' entonces si esta llena Y es igual a la de la BBDD
				if (!empty($datos[0]['pass'])&&$datos[0]["pass"]===md5($_POST["password"])) {
						//Buscamos en la BBDD si el id es Proveedor o Restaurante
						$profesion=$usuario->proveOrest($datos[0]['id']);
						//var_dump($profesion);
						$_SESSION['id']=$profesion[0]['id'];
						$_SESSION['logo']=$profesion[0]['logo'];
						var_dump($_SESSION);

						//En funcion de lo que sea el id (Proveedor/Restaurante) cargamos un menu u otro
						if (isset($profesion[0]["idProveedor"])) {

							$pagina=load_page("app/views/default/indexP.php");
							$pagina = replace_logo('/\#LOGO\#/ms' ,$_SESSION["logo"] , $pagina);
							view_page($pagina);

						}elseif(isset($profesion[0]["idRestaurante"])){
							$pagina=load_page("app/views/default/indexR.php");
							$pagina = replace_logo('/\#LOGO\#/ms' ,$_SESSION["logo"] , $pagina);
							view_page($pagina);
						}
				}else{
					//Si la contraseña no coicide volvemos al login
					//$error=load_page('app/views/default/modules/m_Error.php');
					$pagina=load_page("app/views/default/login.php");
					$error=load_page("app/views/default/modules/m_Error.php");
					$pagina = replace_error("/listo/" , $error, $pagina);
					view_page($pagina);
				}
		}else{
			//si POST esta vacio es la primera vez que entramos al login
			$pagina=load_page("app/views/default/login.php");
			view_page($pagina);
		}

	}

/****************************************************************************/


/*****************INSERTAR USUARIOS NUEVOS*************************************/
	//Despues de rellenar el formulario de registro

	function controlExist($nombre){
		$usuario=new User();
		$datos=$usuario->existo($nombre);
		return $datos;
	}


	///////AQUIIIIIIIIIIIIIIII //////////////
	//determindo ya si eres proveedor o restaurante en funcion del campo tipoUsuario y en funcion de lo que determine se llama a altaProveedor u a altaRestaurante

	function registroUsuario($nombre, $pass, $logo){
		$usuario = new User();	
		$usuario->registro($nombre, $pass, $logo);
	}
	function registroProveedor($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
			$Proveedor=new Proveedor();
			$pagina=load_page("app/views/default/login.php");
			$Proveedor->registro($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion);
			view_page($pagina);
	}
	function registroRestaurante($id,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
			$Restaurante=new Restaurante();
			$pagina=load_page("app/views/default/login.php");
			$Restaurante->registro($id,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion);		
			view_page($pagina);			
	}


	//INTRODUCIR DATOS PARA ALTA//
		function introducirInfo(){					
		$pagina = load_page('app/views/default/modules/m_creacioncuenta.php');
		view_page($pagina);
	}


/********************************************************************************/







	//METODOS QUE MUESTRAN LAS PAGINAS PRINCIPALES DE LOS PROVEEDORES//

	function mostrarMisRestaurantes($idProveedor,$logo){
		$proveedor=new Proveedor();

		$pagina=load_template();	

		$tsArray = $proveedor->verMisRestaurantes($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
			    	var_dump($tsArray);
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_misRestaurantes.php';
					$table = ob_get_clean();	
					$botones=load_page('./app/views/default/modules/m_botonesVacios.php');

					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#TABLA\#/ms' ,'<h3>No existen resultados</h3>', $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
	   			}		
		view_page($pagina);
	}

	function mostrarPedidos($idProveedor,$logo){
		$proveedor=new Proveedor();

		$pagina=load_template();	

		$tsArray = $proveedor->verListaPedidos($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_pedidosProveedor.php';
					$table = ob_get_clean();	
					$botones=load_page('./app/views/default/modules/m_botonesMisPedidosP.php');
					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#TABLA\#/ms' ,'<h3>No existen resultados</h3>', $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
	   			}		
		view_page($pagina);
	}

	function mostrarProductos($idProveedor,$logo){
		$proveedor=new Proveedor();

		$pagina=load_template();	

		$tsArray = $proveedor->verProductos($idProveedor);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_listaProductos.php';
					$table = ob_get_clean();
		
					$botones=load_page("app/views/default/modules/m_botonesMisProductos.php");
					//realiza el parseado 
					var_dump($tsArray);
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#TABLA\#/ms' ,'<h3>No existen resultados</h3>', $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' , $botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
	   			}		
		view_page($pagina);
	}

	function buscarProveedor($idSector,$idRestaurante,$logo){
		$restaurante = new Restaurante();	
		$pagina=load_template();
		$tsArray = $restaurante->verProveedoresPorSector($idSector);	
		//var_dump($tsArray);		   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_listaProveedorR.php';
					$table = ob_get_clean();	
					$botones=load_page('./app/views/default/modules/m_botonesMisProveedores.php');
					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#TABLA\#/ms' ,'<h3>No existen resultados</h3>', $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
	   			}		
		view_page($pagina);
	 }




	//METODOS QUE MUESTRAN LAS PAGINAS PRINCIPALES DE LOS RESTAURANTES//
	function mostrarProveedores($idRestaurante,$logo){
		$restaurante=new Restaurante();

		$pagina=load_template();	

		$tsArray = $restaurante->verListaProveedores($idRestaurante);			   
			    if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
					//carga la tabla de la seccion de m.table_univ.php
					include './app/views/default/modules/m_listaProveedorR.php';
					$table = ob_get_clean();	
					$botones=load_page('./app/views/default/modules/m_botonesMisProveedores.php');
					//realiza el parseado 
						$pagina = replace_content('/\#CONTENT\#/ms' ,$table , $pagina);
						$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
			   	}else{
				   		$pagina = replace_content('/\#TABLA\#/ms' ,'<h3>No existen resultados</h3>', $pagina);	
				   		$pagina = replace_botones('/\#BOTONES\#/ms' ,$botones, $pagina);
						$pagina = replace_logo('/\#LOGO\#/ms' ,$logo , $pagina);
	   			}		
		view_page($pagina);
	}

}
	

?>