<h2>Mis Restaurantes</h2>
		<div class="datagrid table-wrapper">
			<div class="table-scroll">
			<table>
			<thead>
				<tr>
					<th class="tdPeque">Restaurante</th>
					<th class="tdGrande">Dirección</th>
					<th class="tdPeque">Ciudad</th>
					<th class="tdGrande">Email</th>
					<th class="tdPeque">Contacto</th>
					<th class="tdPeque">Gasto Total</th>
				</tr>
			</thead>
			<tbody>
	<!--Mejorar el slide de las tablas al aumentar el contenido-->
			 	<?php foreach ($tsArray as $data): ?>
					<tr class="alt">
						<td class="tdPeque"><?php echo $data['nombreEmpresa'];?></td>
						<td class="tdGrande"><?php echo $data['calle']." ".$data['numero']." ".$data['cp'];?></td>
						<td class="tdPeque"><?php echo $data['localidad'];?></td>
						<td class="tdGrande"><?php echo $data['email'];?></td>
						<td class="tdPeque"><?php echo $data['telefono'];?></td>
						<td class="tdPeque"><?php echo $data['Gasto Total'];?></td>
					</tr>
				 <?php endforeach; ?>
			</tbody>
			
			</table>

		</div>
	</div>