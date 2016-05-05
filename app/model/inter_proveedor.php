<?php
interface Iproveedor {
	 public function addProducto($id, $idProveedor, $tipo, $nombre, $precio, $descripcion, $medida);

	 
	 public function eliminarProducto($idProd, $idProveedor);

	
	 public function verListaPedidos($idProveedor);

	 
	 public function modificarEstadoPedido($idPedido, $estado);
	 

	 public function verMisRestaurantes($idRestaurante, $idProveedor);

	 
	 public function modificarCuenta($id,$nombreUsuario,$pass,$logo,
	 	$sector, $pedidoMinimo,
	 	$cif, $nombreEmpresa, $email, $telefono, $descripcion,
	 	$provincia, $localidad, $calle, $numero, $cp);

}
?>