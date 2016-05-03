<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../css/f_CreacionCuenta.css">
	<meta charset="UTF-8">	
	<title>Proveedor | Lista de Proveedores</title>
</head>
<body>

	<h3>Lista de Proveedores</h3>
	<form method="GET" action="">
		<label>Sector:
			<select class="selectSector">
				<option value="Carnico">Cárnico</option>
				<option value="Pescateria">Pescatería</option>
				<option value="Lacteo">Lácteo</option>
				<option value="Bebida">Bebida</option>
				<option value="Repostería">Repostería</option>
			</select>
		</label>
		<!--Tiene que hacer la seleccion y recargarse sin tener que dar submit-->
	</form>

	<div class="datagrid">
		<table>
			<thead>
				<tr>
					<th>#header1</th>
					<th>#header2</th>
					<th>#header3</th>
					<th>#header4</th>
					<th>#header5</th>
				</tr>
			</thead>
			<tbody>
				<tr class="alt">
					<td>datos</td>
					<td>datos</td>
					<td>datos</td>
					<td>datos</td>
					<td>datos</td>
				</tr>
			</tbody>
		</table>
	</div>			
</body>
</html>