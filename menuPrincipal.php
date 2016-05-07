<?php
	require_once "/app/model/class.user.php";
	require_once "/app/controller/pageGenerator.php";
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//var_dump($_POST);
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
?>