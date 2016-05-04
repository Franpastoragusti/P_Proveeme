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
}
?>