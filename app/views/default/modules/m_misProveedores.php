<h4 class="text-center">Proveedores</h4>
				<table class="table table-hover table-responsive">
				<thead class="text-center">
					<tr>
						<th>Proveedor</th>
						<th class="Grande">Dirección</th>
						<th>Teléfono</th>
						<th>Sector</th>
						<th>Pedido Mínimo €</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tsArray as $data): ?>
						<tr>
							<td><?php echo $data['nombreEmpresa'];?></td>
							<td class="Grande"><?php echo $data['calle']." ".$data['numero']." ".$data['cp'];?></td>
							<td><?php echo $data['telefono'];?></td>
							<td><?php echo $data['sector'];?></td>
							<td><?php echo $data['pedidoMinimo'];?></td>
							<td><?php echo $data['localidad'];?></td>
						</tr>
					 <?php endforeach;?>				
				</tbody>
			</table>