<?php
class Restaurante extends Database implements Irestaurante{

	public function addPedido($idProd, $cantidad){
			//conexion a la base de datos
		$this->conectar();	
		$sentencia = "INSERT INTO contenido_pedidos(idProducto, cantidad) VALUES ('$idProd', '$cantidad')";	
		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	}
 
	 public function verListaPedidos($idRestaurante){

	 	$this->conectar();		
		$query = $this->consulta("SELECT ped.idPedido, ped.estado,e.nombreEmpresa, ped.fechaPedido, ped.fechaEntrega, ped.hora, ped.precioTotalPedido
								FROM procesado_pedido proc, pedidos ped, proveedores prov, restaurante r, empresa e
								WHERE ped.idPedido=proc.idPedido AND prov.idProveedor=proc.idProveedor 
								AND r.idRestaurante=proc.idRestaurante AND r.idRestaurante=e.idUsuario AND proc.idRestaurante='$idRestaurante'");
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

	 public function enviarPedido($idPedido,$precioTotalPedido,$hora,$estado,$idRestaurante,$idProveedor,$idPedido){
	 	$this->conectar();	
		$sentencia = "INSERT INTO pedidos(idPedido,precioTotalPedido,hora,estado) VALUES ('$idPedido', '$precioTotalPedido','$hora','$estado');
					  INSERT INTO procesado_pedido(idRestaurante,idProveedor,idPedido) VALUES ('$idRestaurante','$idProveedor','$idPedido')";	
		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	 }
 
	 public function verListaProveedores(){
	 	$this->conectar();		
		$query = $this->consulta("SELECT e.nombreEmpresa, prov.idProveedor, d.calle, d.numero, d.cp, d.localidad, d.provincia,
								 e.telefono, e.email, prov.pedidoMinimo, prov.sector
								FROM empresa e, proveedores prov, direccion d
								WHERE e.idUsuario=prov.idProveedor AND d.idUsuario=prov.idProveedor");
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

		/*Comentar a juan
	 public function verMisProveedores(){}
 
	 public function addMisProveedores(){}


	 public function eliminarMisProveedores(){}
		*/
 
	 public function modificarCuenta($id,$nombreUsuario,$pass,$logo, 
	 	$cif, $nombreEmpresa, $email, $telefono, $descripcion,
	 	$provincia, $localidad, $calle, $numero, $cp){
	 	//conexion a la base de datos
		$this->conectar();	
		$sentencia = "UPDATE usuarios SET nombreUsuario='$nombreUsuario', pass='$pass', logo='$logo' WHERE id=$id;
					UPDATE empresa SET cif='$cif', nombreEmpresa='$nombreEmpresa', email='$email', telefono='telefono', descripcion='$descripcion' WHERE idUsuario='$id';
					UPDATE direccion SET provincia='$provincia', localidad='$localidad', calle='$calle', numero='$numero', cp='$cp' WHERE idUsuario='$id'";
		echo $sentencia;	
	$query = $this->consulta("UPDATE usuarios SET nombreUsuario='$nombreUsuario', pass='$pass', logo='$logo' WHERE id='$id'; 
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
}
?>