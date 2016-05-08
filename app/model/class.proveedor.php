<?php
require_once "class.db.php";
require_once "inter_proveedor.php";

class Proveedor extends Database implements Iproveedor{

	public function addProducto($id, $idProveedor, $tipo, $nombre, $precio, $descripcion, $medida){
			//conexion a la base de datos
		$this->conectar();	
		$sentencia = "INSERT INTO productos(idProveedor, tipo, nombre, precio, descripcion, medida) VALUES ('$id', '$idProveedor', '$tipo', $nombre, '$precio', '$descripcion', '$medida')";	
		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	}

	 
	 public function eliminarProducto($idProd, $idProveedor){
	 		//conexion a la base de datos
		$this->conectar();	
		$sentencia = "DELETE FROM productos WHERE idProducto='$idProd' AND idProveedor='$idProveedor'";	
		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	 }

	
	 public function verListaPedidos($idProveedor){
	 	$this->conectar();		
		$query = $this->consulta("SELECT ped.idPedido, ped.estado,e.nombreEmpresa, ped.fechaPedido, ped.fechaEntrega, ped.hora, ped.precioTotalPedido
			FROM procesado_pedido proc, pedidos ped, proveedores prov, restaurante r, empresa e
			WHERE ped.idPedido=proc.idPedido AND prov.idProveedor=proc.idProveedor 
			AND r.idRestaurante=proc.idRestaurante AND r.idRestaurante=e.idUsuario 
			AND proc.idProveedor='$idProveedor'");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query)) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}	

	 }

	 
	 public function modificarEstadoPedido($idPedido, $estado){
	 		//conexion a la base de datos
		$this->conectar();	
		$sentencia = "UPDATE pedidos SET estado='$estado' WHERE idPedido='$idPedido'";
		echo $sentencia;	
	$query = $this->consulta("UPDATE pedidos SET estado='$estado' WHERE idPedido='$idPedido'");
 	    $this->disconnect();					
		if($query) // existe -> datos correctos
		{		
				return true;
		}else
		{	
			return false;
		}			
	}
	 

	 function verMisRestaurantes($idProveedor){

	 	$this->conectar();		
	 	$sentencia = "SELECT e.nombreEmpresa, d.calle, d.numero, d.cp, d.localidad, e.telefono, e.email, COUNT(proc.idPedido) AS 'Numero de Pedidos', (SELECT SUM(DISTINCT(ped.precioTotalPedido))
			FROM procesado_pedido proc, contenido_pedidos cont, productos p, proveedores prov, restaurante r, pedidos ped
			WHERE ped.idPedido=proc.idPedido AND cont.idPedido=ped.idPedido AND prov.idProveedor=p.idProveedor AND cont.idProducto=p.idProducto
			AND proc.idRestaurante=r.idRestaurante AND proc.idProveedor=prov.idProveedor AND proc.idRestaurante=5 AND proc.idProveedor=1) AS 'Gasto Total'
			FROM restaurante r, direccion d, empresa e, procesado_pedido proc, pedidos ped, proveedores prov
			WHERE r.idRestaurante=proc.idRestaurante AND proc.idPedido=ped.idPedido AND d.idUsuario=r.idRestaurante AND proc.idProveedor=prov.idProveedor
			AND e.idUsuario=r.idRestaurante AND proc.idRestaurante=5 AND proc.idProveedor=1";
		$query = $this->consulta($sentencia);
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) )
					$data[] = $tsArray;			
				
				return $data;
				
		}else
		{	
			return '';
		}			
	}
	 
	 
	function modificarCuenta($id,$nombreUsuario,$pass,$logo,
	 	$sector, $pedidoMinimo,
	 	$cif, $nombreEmpresa, $email, $telefono, $descripcion,
	 	$provincia, $localidad, $calle, $numero, $cp){
	 	//conexion a la base de datos
		$this->conectar();	
		$sentencia = "UPDATE usuarios SET nombreUsuario='$nombreUsuario', pass='$pass', logo='$logo' WHERE id=$id;
		UPDATE proveedores SET sector='$sector', pedidoMinimo='$pedidoMinimo' WHERE idProveedor='$id';
					UPDATE empresa SET cif='$cif', nombreEmpresa='$nombreEmpresa', email='$email', telefono='telefono', descripcion='$descripcion' WHERE idUsuario='$id';
					UPDATE direccion SET provincia='$provincia', localidad='$localidad', calle='$calle', numero='$numero', cp='$cp' WHERE idUsuario='$id'";
		echo $sentencia;	
	$query = $this->consulta("UPDATE usuarios SET nombreUsuario='$nombreUsuario', pass='$pass', logo='$logo' WHERE id='$id'; 
		UPDATE proveedores SET sector='$sector', pedidoMinimo='$pedidoMinimo' WHERE idProveedor='$id';
							  UPDATE empresa SET cif='$cif', nombreEmpresa='$nombreEmpresa', email='$email', telefono='telefono', descripcion='$descripcion' WHERE idUsuario='$id';
							  UPDATE direccion SET provincia='$provincia', localidad='$localidad', calle='$calle', numero='$numero', cp='$cp' WHERE idUsuario='$id'");
 	    $this->disconnect();					
		if($query) // existe -> datos correctos
		{		
				return true;
		}else
		{	
			return false;
		}
	 }

	 //FALTA FUNCION DE REGISTRO DE PROVEEDOR (REGISTRO)
}
?>