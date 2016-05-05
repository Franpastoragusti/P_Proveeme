<?php
interface Irestaurante {
	 public function addPedido($idProd, $cantidad);
 
	 public function verListaPedidos($idRestaurante);

	 public function enviarPedido($idPedido,$precioTotalPedido,$hora,$estado,$idRestaurante,$idProveedor,$idPedido);
 
	 public function verListaProveedores();

		/*Comentar a juan
	 public function verMisProveedores();
 
	 public function addMisProveedores();

	 public function eliminarMisProveedores();
		*/
 
	 public function modificarCuenta($id,$nombreUsuario,$pass,$logo, 
	 	$cif, $nombreEmpresa, $email, $telefono, $descripcion,
	 	$provincia, $localidad, $calle, $numero, $cp);

	 
	}
?>