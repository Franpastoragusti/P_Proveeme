<h4 class="text-center">Pedidos</h4>
				<table class="table table-hover">
				<thead class="text-center">
					<tr>
						<th>ID</th>
						<th>Proveedor</th>
						<th>Fecha de entrega</th>
						<th>Hora de entrega</th>
						<th>Precio</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tsArray as $data): ?>
						<tr>
							<td><?php echo $data['idPedido'];?></td>
							<td><?php echo $data['nombreEmpresa'];?></td>
							<td><?php echo $data['fechaEntrega'];?></td>
							<td><?php echo $data['hora'];?></td>
							<td><?php echo $data['precioTotalPedido'];?></td>
							<td><?php echo $data['estado'];?></td>
						</tr>
					 <?php endforeach;?>				
				</tbody>
			</table>