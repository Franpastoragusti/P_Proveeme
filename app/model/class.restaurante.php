<?php
require_once "class.db.php";
require_once "inter_restaurante.php";
class Restaurante extends Database implements Irestaurante{

 
	 public function verListaPedidos($idRestaurante){

	 	$this->conectar();		
		$query = $this->consulta("SELECT ped.idPedido, ped.estado,e.nombreEmpresa, proc.idProveedor, ped.fechaEntrega, ped.hora, ped.precioTotalPedido
								FROM procesado_pedido proc, pedidos ped, proveedores prov, restaurante r, empresa e
								WHERE ped.idPedido=proc.idPedido AND prov.idProveedor=proc.idProveedor AND e.idUsuario=prov.idProveedor AND r.idRestaurante=proc.idRestaurante AND proc.idRestaurante='$idRestaurante'");




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







	 public function insertarPedido(){
	 	$this->conectar();	
		$sentencia = "INSERT INTO pedidos(estado) VALUES 'Pendiente'";

		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	 }


	 public function detectarPedido(){
	 	$this->conectar();	
		$sentencia = "SELECT p.idPedido FROM pedidos p ORDER BY p.idPedido DESC LIMIT 1";

		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return $query;
		}else{
			$this->disconnect();	
			return '';
		}
	 }

	 public function insertarProcesadoPedido($idPedido,$idRestaurante,$idProveedor){

	 	$sentencia = "INSERT INTO procesado_pedido (idPedido, idRestaurante, idProveedor) VALUES ($idPedido, $idRestaurante, $idProveedor)";

		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	 }


	 





	public function detectaProducto($nombreProd,$medida){
		 	$this->conectar();		
			$query = $this->consulta("SELECT COUNT(*) FROM productos p WHERE p.nombre='$nombreProd' AND p.medida='$medida'");
	 	    $query2 = $this->consulta("SELECT p.idProducto FROM productos p WHERE p.nombre='$nombreProd' AND p.medida='$medida'");
	 	    
	 	    				
			if($this->numero_de_filas($query) > 0){ // existe -> datos correctos
					//se llenan los datos en un array
					while ( $tsArray = $this->fetch_assoc($query2)) 
						$data[] = $tsArray;			
			
					return $data;
			}else
			{	
				return '';
			
			}	

		 }













 
	 public function verListaProveedores($idRestaurante){
	 	$this->conectar();		
		$query = $this->consulta("SELECT prov.idProveedor, e.nombreEmpresa, prov.idProveedor, d.calle, d.numero, d.cp, d.localidad, d.provincia,
								 e.telefono, e.email, prov.pedidoMinimo, prov.idSector
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
	public function verProveedoresPorSector($idSector){
	 	$this->conectar();		
		$query = $this->consulta("SELECT e.nombreEmpresa, prov.idProveedor, d.calle, d.numero, d.cp, d.localidad, d.provincia, e.telefono, e.email, prov.pedidoMinimo FROM empresa e, proveedores prov, direccion d, productos p, productos_proveedor prod WHERE e.idUsuario=prov.idProveedor AND d.idUsuario=prov.idProveedor AND prod.idProveedor=prov.idProveedor AND p.idProducto=prod.idProducto AND p.idSector=$idSector GROUP BY prov.idProveedor");
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


 
	 public function modificarCuenta($id,$nombreUsuario,$pass,$logo, 
	 	$cif, $nombreEmpresa, $email, $telefono, $descripcion,
	 	$provincia, $localidad, $calle, $numero, $cp){
	 	//conexion a la base de datos
		$this->conectar();	
		$sentencia = "UPDATE usuarios SET nombreUsuario='$nombreUsuario', pass='$pass', logo='$logo' WHERE id=$id";
		$sentencia2 = "UPDATE empresa SET cif='$cif', nombreEmpresa='$nombreEmpresa', email='$email', telefono='telefono', descripcion='$descripcion' WHERE idUsuario='$id'";
		$sentencia3 = "UPDATE direccion SET provincia='$provincia', localidad='$localidad', calle='$calle', numero='$numero', cp='$cp' WHERE idUsuario='$id'";
 	    $this->disconnect();					
		if($query = $this->consulta($sentencia)&&$query2 = $this->consulta($sentencia2)&&$query3 = $this->consulta($sentencia3)) // existe -> datos correctos
		{		
				return true;
		}else
		{	
			return false;
		}
	 }

	function registro($id,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
	//conexion a la base de datos
		$this->conectar();	
		$sentencia = "INSERT INTO restaurante(idRestaurante) VALUES ($id)";
		$sentencia2 = "INSERT INTO empresa(idUsuario, cif, nombreEmpresa, email, telefono, descripcion) VALUES ($id, '$cif', '$empresa', '$email', $telefono, '$descripcion')";
		$sentencia3="INSERT INTO direccion(idUsuario, provincia, localidad, calle, numero, cp) VALUES ($id, '$provincia', '$localidad', '$calle', $numero, '$cp')";	

		if($query = $this->consulta($sentencia)&&$query2 = $this->consulta($sentencia2)&&$query3 = $this->consulta($sentencia3)){
			$this->disconnect();
			return true;
		}else{	
			$this->disconnect();
			return false;
		}
	}



	function verProductosProveedor($idProveedor){
		$this->conectar();		
		$query = $this->consulta("SELECT e.nombreEmpresa, p.nombre,s.nombre AS 'Tipo' , prod.precio, p.medida, p.idProducto
									FROM productos p, proveedores prov, productos_proveedor prod, sectores s, empresa e
									WHERE prod.idProveedor=prov.idProveedor AND prod.idProducto=p.idProducto 
									AND s.idSector=p.idSector AND e.idUsuario=prov.idProveedor AND e.nombreEmpresa like '$idProveedor'");
 	    $this->disconnect();	

		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data[] = $tsArray;	
					$_SESSION['VECTOR'][1][]=$data[0]['idProducto'];		
				var_dump($data['idProducto']);
				var_dump($_SESSION);
				return $data;
		}else
		{	
			return '';
		}			

	}
}

?>