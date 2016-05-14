<h4 class="text-center"><?php echo "Contenido del pedido $idPedido";?></h4>
				<table class="table table-hover">
				<thead class="text-center">
					<tr>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Medida</th>
						<th>Precio total</th
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tsArray as $data): ?>
						<tr>
							<td><?php echo $data['nombre'];?></td>
							<td><?php echo $data['cantidad'];?></td>
							<td><?php echo $data['Precio'];?></td>
							<td><?php echo $data['medida'];?></td>
							<td><?php echo $data['preciototal'];?></td>
						</tr>
					 <?php endforeach;?>				
				</tbody>
			</table>