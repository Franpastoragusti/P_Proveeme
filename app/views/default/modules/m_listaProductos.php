<h4 class="text-center">Productos</h4>
				<table class="table table-hover">
				<thead class="text-center">
					<tr>
						<th>Nº</th>
						<th>Producto</th>
						<th>Tipo</th>
						<th>Precio</th>
						<th>Medida</th>
						<th class="Grande">Descripción</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tsArray as $data): ?>
						<tr>
							<td><?php echo $data['idProducto'];?></td>
							<td><?php echo $data['nombre'];?></td>
							<td><?php echo $data['tipo'];?></td>
							<td><?php echo $data['precio'];?></td>
							<td><?php echo $data['medida'];?></td>
							<td class="Grande"><?php echo $data['descripcion'];?></td>
						</tr>
					 <?php endforeach;?>				
				</tbody>
			</table>