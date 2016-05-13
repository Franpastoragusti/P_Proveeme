<?php
interface Iproveedor {
	 public function addProductoTablaProd($idSector, $nombre, $medida);

	 
	 public function eliminarProducto($idProd, $idProveedor);

	
	 public function verListaPedidos($idProveedor);

	 
	 public function modificarEstadoPedido($idPedido, $estado, $hora, $fecha); 
	 

	 public function verMisRestaurantes($idProveedor);

	 
	 public function modificarCuenta($id,$nombreUsuario,$pass,$logo,
	 	$sector, $pedidoMinimo,
	 	$cif, $nombreEmpresa, $email, $telefono, $descripcion,
	 	$provincia, $localidad, $calle, $numero, $cp);
	 public function registro($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion);

}
?>