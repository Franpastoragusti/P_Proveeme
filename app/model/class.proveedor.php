<?php
require_once "class.db.php";
require_once "inter_proveedor.php";


class Proveedor extends Database implements Iproveedor{

	//Falta una funcion de selec de id Producto


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

	 /*********FUNCIONES DE PRODUCTO***********/



	public function addProductoTablaProd($idSector, $nombreProd, $medida){
			//conexion a la base de datos
	
		$sentencia = "INSERT INTO productos(idSector, nombre, medida) VALUES ($idSector, '$nombreProd', '$medida')";
		if($query = $this->consulta($sentencia)){
		
			return true;
		}else{
	
			return false;
		}
	}
	public function addProductoTablaProd_Prov($idProducto, $idProveedor, $precio){
			//conexion a la base de datos
	
		$sentencia = "INSERT INTO productos_proveedor(idProducto, idProveedor, Precio) VALUES ($idProducto, $idProveedor, '$precio')";

		if($query= $this->consulta($sentencia)){
		
			return true;
		}else{	
			
			return false;
		}
	}
	 
	 public function eliminarProducto($idProd, $idProveedor){
	 		//conexion a la base de datos
		$this->conectar();	
		$sentencia = "DELETE FROM productos_proveedor WHERE idProducto='$idProd' AND idProveedor='$idProveedor'";	
		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	 }

	/******************************FUNCIONES DE PEDIDOS*********/
	 public function verListaPedidos($idProveedor){
	 	$this->conectar();		
		$query = $this->consulta("SELECT ped.idPedido, ped.estado,e.nombreEmpresa,ped.fechaEntrega, ped.hora, ped.precioTotalPedido
								FROM procesado_pedido proc, pedidos ped, proveedores prov, restaurante r, empresa e
								WHERE ped.idPedido=proc.idPedido AND prov.idProveedor=proc.idProveedor 
								AND r.idRestaurante=proc.idRestaurante AND r.idRestaurante=e.idUsuario AND proc.idProveedor='$idProveedor'");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0){ // existe -> datos correctos
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query)) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}	

	 }

	 
	 public function modificarEstadoPedido($idPedido, $estado, $hora, $fecha){
	 		//conexion a la base de datos
		$this->conectar();	
		$sentencia = "UPDATE pedidos SET estado='$estado', hora='$hora', fechaEntrega='$fecha' WHERE idPedido=$idPedido";	
		$query = $this->consulta($sentencia);
 	    $this->disconnect();					
		if($query) // existe -> datos correctos
		{		
				return true;
		}else
		{	
			return false;
		}			
	}









	/**********************************************************************************************************************/
	 













	 function verMisRestaurantes($idProveedor){

	 	$this->conectar();		
	 	$sentencia = "SELECT DISTINCT (e.nombreEmpresa), d.calle, d.numero, d.cp, d.localidad, e.telefono, e.email, r.idRestaurante,
	 					SUM(DISTINCT(ped.precioTotalPedido)) AS 'Gasto Total'
						FROM procesado_pedido proc, contenido_pedidos cont, proveedores prov, restaurante r, pedidos ped, direccion d, empresa e
						WHERE ped.idPedido=proc.idPedido AND cont.idPedido=ped.idPedido AND e.idUsuario=r.idRestaurante
						AND proc.idRestaurante=r.idRestaurante AND proc.idProveedor=prov.idProveedor AND proc.idProveedor=$idProveedor
						AND proc.idPedido=ped.idPedido AND d.idUsuario=r.idRestaurante AND proc.idProveedor=prov.idProveedor
						GROUP BY r.idRestaurante";
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
	 
	function datosRestaurante($id){
		
//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT e.nombreEmpresa, d.calle, d.numero, d.cp, d.localidad, e.telefono, e.email
							FROM restaurante r, direccion d, empresa e, procesado_pedido proc, pedidos ped, proveedores prov
							WHERE r.idRestaurante=proc.idRestaurante AND proc.idPedido=ped.idPedido 
							AND d.idUsuario=r.idRestaurante AND proc.idProveedor=prov.idProveedor
							AND e.idUsuario=r.idRestaurante AND proc.idRestaurante='$id'");
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
	 
	function modificarCuenta($id,$nombreUsuario,$logo,
	 	$sector, $pedidoMinimo,
	 	$cif, $nombreEmpresa, $email, $telefono, $descripcion,
	 	$provincia, $localidad, $calle, $numero, $cp){
	 	//conexion a la base de datos
		$this->conectar();	
		$sentencia1 = "UPDATE usuarios SET nombreUsuario='$nombreUsuario', logo='$logo' WHERE id=$id";
		$sentencia2 = "UPDATE proveedores SET idSector='$sector', pedidoMinimo='$pedidoMinimo' WHERE idProveedor=$id";
		$sentencia3 = "UPDATE empresa SET cif='$cif', nombreEmpresa='$nombreEmpresa', email='$email', telefono='telefono', descripcion='$descripcion' WHERE idUsuario='$id'";
		$sentencia4 = "UPDATE direccion SET provincia='$provincia', localidad='$localidad', calle='$calle', numero='$numero', cp='$cp' WHERE idUsuario='$id'";	
 	    $this->disconnect();					
		if($query = $this->consulta($sentencia1)&&$query2 = $this->consulta($sentencia2)&&$query3 = $this->consulta($sentencia3)&&$query4 = $this->consulta($sentencia4)) // existe -> datos correctos
		{		
				return true;
		}else
		{	
			return false;
		}
	 }


	 function misDatos($idProveedor){
	 	$this->conectar();		
		$query = $this->consulta("SELECT  u.nombreUsuario, u.logo, prov.idProveedor, e.nombreEmpresa, e.cif, d.calle, d.numero, d.cp, d.localidad, d.provincia,
								 e.telefono, e.email, prov.pedidoMinimo, prov.idSector
								FROM empresa e, proveedores prov, direccion d, usuarios u
								WHERE e.idUsuario=prov.idProveedor AND d.idUsuario=prov.idProveedor AND d.idUsuario=u.id AND d.idUsuario=$idProveedor");
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
	 function registro($id,$sector,$pedidoMin,$empresa,$cif,$telefono,$email,$provincia,$localidad,$cp,$calle,$numero,$descripcion){
	 	//conexion a la base de datos
		$this->conectar();	
		$sentencia = "INSERT INTO proveedores(idProveedor, idSector, pedidoMinimo) VALUES ('$id', '$sector', '$pedidoMin')";
		$sentencia2="INSERT INTO empresa(idUsuario, cif, nombreEmpresa, email, telefono, descripcion) VALUES ('$id', '$cif', '$empresa', '$email', '$telefono', '$descripcion')";
		$sentencia3="INSERT INTO direccion(idUsuario, provincia, localidad, calle, numero, cp) VALUES ('$id', '$provincia', '$localidad', '$calle', '$numero', '$cp')";	
		if($query = $this->consulta($sentencia)&&$query2 = $this->consulta($sentencia2)&&$query3 = $this->consulta($sentencia3)){
			$this->disconnect();
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	 }

	function verProductos($idProveedor)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT p.nombre,s.nombre AS 'Tipo' , prod.precio, p.medida, p.idProducto
									FROM productos p, proveedores prov, productos_proveedor prod, sectores s
									WHERE prod.idProveedor=prov.idProveedor AND prod.idProducto=p.idProducto 
									AND s.idSector=p.idSector AND prov.idProveedor='$idProveedor'");
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
}
?>