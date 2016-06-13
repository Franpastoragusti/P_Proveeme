<h4 class="text-center">Productos</h4>
				<table class="table table-hover t-5">
				<thead class="text-center">
					<tr class="telegir">
						<th>Nº</th>
						<th>Producto</th>
						<th>Tipo</th>
						<th>Precio</th>
						<th>Medida</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tsArray as $data): ?>
						<tr>
							<td><?php echo $data['idProducto'];?></td>
							<td><?php echo $data['nombre'];?></td>
							<td><?php echo $data['Tipo'];?></td>
							<td><?php echo $data['precio'];?></td>
							<td><?php echo $data['medida'];?></td>
						</tr>
					 <?php endforeach;?>				
				</tbody>
			</table>