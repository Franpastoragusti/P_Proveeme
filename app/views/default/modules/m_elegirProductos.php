<h4 class="text-center">Productos del proveedor<?php echo "Contenido del pedido $idProveedor";?></h4>
				<table class="table table-hover">
				<thead class="text-center">
					<tr>
						<th>Nº</th>
						<th>Producto</th>
						<th>Tipo</th>
						<th>Precio</th>
						<th>Medida</th>
						<th>Cantidad</th>
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
							<td>
								<form class="form-horizontal" method="POST" action="index.php">
							        <div class="form-group">
							            <div class="col-xs-9">
							                <input type="number" class="form-control" name="cantidades[]" id="cantidades" required>
							       		</div>
							       	</div>
						   	 	</form>
					    	</td>
						</tr>
					 <?php endforeach;?>			
				</tbody>
			</table>