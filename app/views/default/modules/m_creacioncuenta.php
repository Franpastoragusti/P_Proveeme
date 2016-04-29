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
					       	<input type="radio" name="tipoUsuario" value="Restaurante">
					       	</label>
				        	<label class="radio">Proveedor
				        	<input type="radio" name="tipoUsuario" value="Proveedor">
				        	</label>
				    </fieldset>
				    <input type="submit" value="enviar"></input>
			    </div>
				<div class="lateral-derecha">
				    <fieldset>
				       <legend> Datos Empresa:</legend> 
				          	<div>
					          	<label>Nombre Propietario
					          		<input type="text" id="nombreProp" required/>
					          	</label>
					          	<label>Apellidos
					          		<input type="text" id="apellidos" required/>
					          	</label>
					          	<label>Nombre Empresa
					          		<input type="text" id="nombreEmp" required>
					          	</label>
					          	<label>CIF:
					          		<input type="number" id="cif" required />
					          	</label>
					          	<label>Telefono
					          		<input type="number" id="telefono" required/>
					          	</label>
					          	<label>Email:
					          		<input type="email" id="email" required/>
					          	</label>
					        </div>
						<fieldset>
				        	<legend>Direccion</legend>
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
				        		<input type="text" id="calle" required/>
				        	</label>
				        	<label>Nº
				        		<input type="number" id="numero" required/>
				        	</label> 
				    	</fieldset>
				    	<label>Descripción</label>
					    	<textarea rows="10" cols="90"></textarea>    
				    </fieldset>
				</div>
			</form>
	</div>
</body>
</html>