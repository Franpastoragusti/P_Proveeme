<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/f_CreacionCuenta.css">
	<meta charset="UTF-8">	
</head>
<title>Proveedor | Tabla Datos Restaurante</title>
	<body class="formEmergente">
		<form method="POST" action="">
			<fieldset>
			    <legend> #NOMBREEMPRESA#</legend> 
			       <label class="inlineBlock">Email: 
			       		<input type="email" class="anchocampo" name="email" required/>
			       </label>
			       <label class="inlineBlock">Telefono 
			     		<input type="text" class="anchocampo" name="telefono" required/>
			       </label>
				<fieldset>	
			        <legend> Dirección</legend>
			        <div class="lateral-izquierda">
			        	<label for="Provincia">Provincia</label>
				        <select name="Provincia" class="anchocampo">
							<option selected="selected">Valencia</option>
							<option>Castellón</option>
							<option>Alicante</option>
						</select>
						<label>Localidad 
						   	<input type="text" class="anchocampo" name="localidad" required/>
						</label>
					</div>
					<div class="lateral-derecha">
	      				<label id="cp">CP: 
	      					<input type="text" class="anchocampo" name="codigopostal" pattern="[0-9]{5}" required/>
	      				</label>
						<label>Calle 
							<input type="text" class="anchocampo"name="calle" required/>
						</label>
						<label>Nº: 
							<input type="number" name="numero" class="anchocampo" />
						</label>
					</div>
				</fieldset>
			</fieldset> 
			<div>   
			    <input class="boton" type="submit" value="Enviar"/>
			    <input type="button" value="Cancelar" class="boton" onclick= "self.location.href = '../page.php'" />
			</div> 
		</form>
	</body>
</html>