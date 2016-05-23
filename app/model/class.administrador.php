<?php
require_once "class.db.php";

class Admin{
	function verUsuarios(){
		
		$this->conectar();	
			$query = $this->consulta("SELECT * FROM usuarios");						
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
			$query = $this->consulta("SELECT * FROM pedidos");						
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