<h4 class="text-center">Mis Restaurantes</h4>
				<table class="table table-hover">
				<thead>
					<tr>
						<th>Restaurante</th>
						<th class="Grande">Dirección</th>
						<th>Ciudad</th>
						<th class="Grande">Email</th>
						<th>Contacto</th>
						<th>Gasto Total</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tsArray as $data): ?>
						<tr>
							<td><?php echo $data['nombreEmpresa'];?></td>
							<td class="Grande"><?php echo $data['calle']." ".$data['numero']." ".$data['cp'];?></td>
							<td><?php echo $data['localidad'];?></td>
							<td class="Grande"><?php echo $data['email'];?></td>
							<td><?php echo $data['telefono'];?></td>
							<td><?php echo $data['Gasto Total'];?></td>
						</tr>
					 <?php endforeach; ?>				
				</tbody>
			</table>