<?php
require_once "class.db.php";
require_once "inter_proveedor.php";

class Proveedor extends Database implements Iproveedor{

	public function addProducto($id, $){
			//conexion a la base de datos
		$this->conectar();	
		$sentencia = "INSERT INTO productos VALUES ('$idProd', '$apellido1', '$apellido2', $dni, '$facultad')";	
		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	}

	 
	 public function eliminarProducto(){

	 }

	
	 public function verListaPedidos(){

	 }

	 
	 public function modificarEstadoPedido(){

	 }
	 

	 public function verMisRestaurantes(){

	 }
	 
	 public function modificarCuenta(){

	 }

	 
	 public function cancelarPedido(){

	 }
}
?>