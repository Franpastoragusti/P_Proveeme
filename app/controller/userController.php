<?php

require_once './app/model/class.user.php';
//require 'app/model/class.restaurante.php';
//require 'app/model/class.proveedor.php';
//require 'app/model/class.pedido.php';
require_once './app/controller/pageGenerator.php';

class user_controller {

	function menuPrincipal($id,$logo){
			$usuario = new User();
			$datos=$usuario->existo($nombre);
			$profesion=$usuario->proveOrest($id);
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

	function decision(){
		
		$usuario = new User();
		//var_dump($_SESSION);
		//var_dump($_POST);
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
						//var_dump($_SESSION);

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
			$error=load_page("app/views/default/modules/m_Error.php");
			view_page($pagina);
		}

	}


/****************************************************************************************************************************/
/***********************************************INSERTAR USUARIOS NUEVOS*****************************************************/
/****************************************************************************************************************************/

	function controlExist($nombre){
		$usuario=new User();
		$datos=$usuario->existo($nombre);
		return $datos;
	}

	function registroUsuario($nombre, $pass, $logo){
		$usuario = new User();	
		$usuario->registro($nombre, $pass, $logo);
	}








}



