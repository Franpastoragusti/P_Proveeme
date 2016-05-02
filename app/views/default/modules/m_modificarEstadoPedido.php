<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../css/f_CreacionCuenta.css">
	<meta charset="UTF-8">	
	<title>Proveedor | Tabla Modificar Estado</title>
</head>
<body>
<form>
	<fieldset id="field">
		<legend>Datos del pedido</legend>
		<div class="lateral-izquierda">
			<label>ID <input type="number" id="id" required/></label>
			<label>Restaurante <input id="nombrerestaurante"type="text" id="required" required/></label>
			<label>Fecha pedido <input id="fechapedido" type="date" id="pattern" /></label>
		</div>
		<div class="lateral-derecha">
			<label>Estado <select name="Estado">
				<option selected="selected">Pendiente</option>
				<option>No pendiente</option>
			</select>
			</label>
			<label>Fecha de entrega <input id="fechaentrega" type="date" id="pattern" /></label>
			<label>Hora de entrega <input id="horaentrega" type="time" id="pattern" /></label>
		</div>			
	</fieldset>
	<div id="botones">
		<input class="boton" type="submit" value="Enviar"/>
		<input class="boton" type="button" value="Cancelar" id="atras" name="Atrás" onclick= "self.location.href = '../page.php'" />
	</div>
</form>			
</body>
</html>