<?php
	require_once "C:/xampp/htdocs/P_Proveeme/app/model/class.user.php";
	var_dump($_POST);
	$usuario = new User();
	$nombre=$_POST["username"];
	$datos=$usuario->decision($nombre);	
	var_dump($datos);
	$id=$datos[0]['id'];
	

	if ($_POST["password"]==$datos[0]["pass"]) {
		if ($usuario->proveOrest($id)) {
			echo "eres un proveedor";
		}else{
			echo "eres un restaurante";
		}
	}
?>