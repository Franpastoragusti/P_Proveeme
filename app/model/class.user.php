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
	function registrarse($id, $nombre, $pass, $logo){
		//conexion a la base de datos
		$this->conectar();	
		$sentencia = "INSERT INTO usuarios(id, nombreUsuario, pass, logo) 
		VALUES ('$id', '$nombre', '$pass', '$logo')";	
		if($query = $this->consulta($sentencia)){
			$this->disconnect();	
			return true;
		}else{
			$this->disconnect();	
			return false;
		}
	}
}
?>