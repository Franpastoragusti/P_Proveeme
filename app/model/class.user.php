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



	//Estas funciones van juntas, una abre y otra cierra la conexion///////////////////////////////////
	function existo($nombre){
		$this->conectar();	
		$query = $this->consulta("SELECT u.id, u.pass FROM usuarios u WHERE u.nombreUsuario='$nombre'");						
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
	function proveOrest($id){
		$sentenciaP = "SELECT * FROM proveedores p, usuarios u WHERE u.id='$id' AND p.idProveedor=u.id";
		$query=$this->consulta($sentenciaP);

		$sentenciaR="SELECT * FROM restaurante r, usuarios u WHERE u.id='$id' AND r.idRestaurante=u.id";
		$query2=$this->consulta($sentenciaR);

		$this->disconnect();	

		if($this->numero_de_filas($query) > 0){		
				//se llenan los datos en un array
			while ( $tsArray = $this->fetch_assoc($query) ) 
				$data[] = $tsArray;			
	
			return $data;
		}	

		if($this->numero_de_filas($query2) > 0){		
			//se llenan los datos en un array
			while ( $tsArray = $this->fetch_assoc($query2) ) 
				$data[] = $tsArray;			
		
			return $data;
		}	
	}		
	////////////////////////////////////////////////////////////////////////////////////////////////////////










}
?>