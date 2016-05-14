<?php
require_once "class.db.php";
require_once "inter_pedido.php";

class Pedido extends Database implements Ipedido{

		function precioTotal($idPedido){
			$this->conectar();		
		$query = $this->consulta(/*"Consulta necesaria, juan tiene que explicarla"*/);
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



	function verProductosPedido($idPedido){
		$this->conectar();		
	 	$sentencia = "SELECT p.nombre, p.medida, prod.Precio, cont.cantidad, (cont.cantidad * prod.Precio) AS 'preciototal'
			FROM productos p, productos_proveedor prod, proveedores prov, contenido_pedidos cont, procesado_pedido proc, pedidos ped
			WHERE p.idProducto=prod.idProducto AND prov.idProveedor=prod.idProveedor AND proc.idProveedor=prov.idProveedor
			AND cont.idProducto=prod.idProducto AND cont.idPedido=proc.idPedido AND ped.idPedido=proc.idPedido AND proc.idPedido=$idPedido
			GROUP BY p.idProducto";
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
	
	function verDatosRestaurantePedido($idRestaurante){
		$this->conectar();		
	 	$sentencia = "SELECT e.nombreEmpresa, d.provincia, d.localidad, d.calle, d.numero, d.cp
						FROM empresa e, direccion d, procesado_pedido proc, restaurante r
						WHERE e.idUsuario=r.idRestaurante AND r.idRestaurante=proc.idRestaurante 
						AND d.idUsuario=e.idUsuario AND r.idRestaurante='$idRestaurante'";
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
	function precioTotalPedido($idPedido){
		$this->conectar();		
	 	$sentencia = "SELECT cont.cantidad * prod.Precio AS PrecioTotalProducto
					FROM contenido_pedidos cont, pedidos ped, productos p, productos_proveedor prod, proveedores prov, procesado_pedido proc
					WHERE cont.idPedido=proc.idPedido AND cont.idProducto=prod.idProducto AND prod.idProducto=p.idProducto 
					AND prod.idProveedor=prov.idProveedor AND prod.idProveedor=proc.idProveedor AND proc.idPedido='$idPedido'
					GROUP BY p.idProducto";
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

}
?>