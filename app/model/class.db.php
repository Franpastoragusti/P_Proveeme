<?php
/*
CLASE PARA LA CONEXION Y LA GESTION DE LA BASE DE DATOS Y LA PAGINA WEB
*/
class Database {

 private $conexion;
  
    /* METODO PARA CONECTAR CON LA BASE DE DATOS*/
	public function conectar()
	{
		if(!isset($this->conexion))
		{
			
		  $this->conexion = (mysqli_connect("localhost","root","", "proveeme"));
		  //para conectar con RDS el Usuario es admin y la pass 1234ABCD
		  mysqli_set_charset($this->conexion, "utf8");
		  
		}
	}	



     /* METODO PARA CONECTAR CON LA BASE DE DATOS CON AWS
     
  public function conectar()
	{	
		include("mysqli.inc.php");
		if(!isset($this->conexion))
		{
			
		  $this->conexion = mysqli_connect($mysql_server,$mysql_login,$mysql_pass,$mysql_db,3306) or die(mysqli_error());
		  //para conectar con RDS el Usuario es admin y la pass 1234ABCD
		  mysqli_set_charset($this->conexion, "utf8");
	}	
	}
	
  
 	*/











	public function consulta($sql)
	{
		$resultado = mysqli_query($this->conexion,$sql);
					
		return $resultado; 
	}
	
	/*METODO PARA CONTAR EL NUMERO DE RESULTADOS
		INPUT: $result
		OUTPUT:  cantidad de registros encontrados
	*/
	function numero_de_filas($result){
		
		return mysqli_num_rows($result);
	}
	
	/*METODO PARA CREAR ARRAY DESDE UNA CONSULTA
		INPUT: $result
		OUTPUT: array con los resultados de una consulta
	*/
	function fetch_assoc($result){
		
			return mysqli_fetch_assoc($result);
	}
	
     /* METODO PARA CERRAR LA CONEXION A LA BASE DE DATOS */	
	public function disconnect()
	{
		mysqli_close($this->conexion);
	}
	
}
?>