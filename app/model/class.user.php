<?php
require_once "class.db.php";
require_once "inter_user.php";
class User extends Database implements Iuser{

	function login($nombre,$pass){
		$this->conectar();		/*Juanmi tiene que explicarlo*/
		$query = $this->consulta("SELECT * FROM usuarios WHERE nombreUsuario='$nombre' AND pass='$pass'");
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