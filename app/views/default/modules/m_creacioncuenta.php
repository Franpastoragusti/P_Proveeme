<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/f_CreacionCuenta.css">
	<meta charset="UTF-8">	
	<title>Proveeme | Sign in</title>
</head>
<body>
	<div class="container">
		<h1>Formulario de registro</h1>
		<form method="POST" action="">
			   <div class="lateral-izquierda">
					<fieldset>
      					<legend>Datos Usuario</legend>
				        	<label>Usuario</label> 
				        	<input type="text" id="usuario" required />
				       		<label>Contraseña</label>
				        	<input type="password" name="contraseña" size="20" maxlengh="20" required >
				        	<label>Confirmar Contraseña:</label> 
				        	<input type="password" name="contraseña" size="20" maxlengh="20" required/>
					       	<label class="radio">Restaurante
					       	<input type="radio" name="tipoUsuario" value="Restaurante" class="radioBut">
					       	</label>
				        	<label class="radio">Proveedor
				        	<input type="radio" name="tipoUsuario" value="Proveedor" class="radioBut">
				        	</label>
				    </fieldset>
				    <input type="submit" value="enviar">
			    </div>
				<div class="lateral-derecha">
				    <fieldset>
				       <legend> Datos Empresa</legend>
					          	<label>Nombre Empresa
					          		<input type="text" id="nombreEmp" required/>
					          	</label>
					          	<label>CIF:
					          		<input type="text" required />
					          	</label>
					          	<label>Telefono
					          		<input type="number" id="telefono" required/>
					          	</label>
					          	<label>Email:
					          		<input type="email" id="email" required/>
					          	</label>
						<fieldset>
						<legend> Datos Empresa:</legend>
				        	<label>Provincia:
					      		<select name="Provincia">
							        <option selected="selected">Valencia</option>
							        <option>Castellón</option>
							        <option>Alicante</option>
					      		</select>
				        	</label>
				        	<label>Localidad:
				        		<input type="text" id="localidad" required/>
				        	</label>
				        	<label>Código postal:
				        		<input type="text" id="CP" required/>
				        	</label> 
				        	<label>Calle
				        		<input type="text" required/>
				        	</label>
				        	<label>Nº
				        		<input type="number" id="numero" required/>
				        	</label>
				    	<label >Descripción
					    	<textarea rows="10" cols="50"></textarea>  
					    </label>  
				    </fieldset>
				</fieldset>
			</div>
		</form>
	</div>
</body>
</html>
