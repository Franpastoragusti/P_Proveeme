<?php
require_once "class.db.php";
require_once "inter_administrador.php";
function verUsuarios(){
	
	$this->conectar();	
		$query = $this->consulta("SELECT * FROM usuarios u");						
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
function verPedidos(){
	$this->conectar();	
		$query = $this->consulta("SELECT * FROM pedidos p");						
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
?>