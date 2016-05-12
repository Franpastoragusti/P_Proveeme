<h4 class="text-center">Proveedores</h4>
				<div class="bs-primary"> 
					<nav class="navbar navbar-default navbar-static"> 
						<div class="container-fluid"> 
							<div class="navbar-header"> 
								<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse">
									<span class="sr-only">Toggle navigation</span> 
									<span class="icon-bar"></span> <span class="icon-bar"></span> 
									<span class="icon-bar"></span>
								</button> 
								<span class="navbar-brand">Busqueda por sector</span> 
							</div> 
							<div class="collapse navbar-collapse bs-example-js-navbar-collapse"> 
								<ul class="nav navbar-nav navbar-right"> 
									<li id="fat-menu" class="dropdown"> 
										<a id="drop3" href="" class="dropdown-toggle" data-toggle="dropdown" name="drop" role="button" aria-haspopup="true" aria-expanded="false"> 
											Seleccione 
											<span class="caret"></span> 
										</a>
										<ul class="dropdown-menu" aria-labelledby="drop3">
											<li><a href="index.php?action=RLProveedores&sector=1">Carniceria</a></li> 
											<li><a href="index.php?action=RLProveedores&sector=2">Bebidas</a></li> 
											<li><a href="action=RLProveedores&sector=3">Reposteria</a></li> 
											<li><a href="action=RLProveedores&sector=4">Congelados</a></li> 
											<li><a href="action=RLProveedores&sector=5">Pescaderia</a></li> 
											<li><a href="action=RLProveedores&sector=6">Menaje</a></li> 
											<li><a href="action=RLProveedores&sector=7">Hortofruticola</a></li> 
											<li><a href="action=RLProveedores&sector=8">Lacteos</a></li> 
											<li><a href="action=RLProveedores&sector=9">Aliños</a></li> 
											<li><a href="action=RLProveedores&sector=10">Aditivos</a></li> 


										</ul> 
									</li> 
								</ul>
							</div>
						</div>
					</nav> 
				</div>
				<table class="table table-hover">
				<thead class="text-center">
					<tr>
						<th>Proveedor</th>
						<th>Dirección</th>
						<th>Localidad</th>
						<th>Teléfono</th>
						<th>Sector</th>
						<th>Pedido Mínimo €</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tsArray as $data): ?>
						<tr>
							<td><?php echo $data['nombreEmpresa'];?></td>
							<td><?php echo $data['calle']." ".$data['numero']." ".$data['cp'];?></td>
							<td><?php echo $data['localidad'];?></td>
							<td><?php echo $data['telefono'];?></td>
							<td><?php echo $data['idSector'];?></td>
							<td><?php echo $data['pedidoMinimo'];?></td>
						</tr>
					 <?php endforeach;?>				
				</tbody>
			</table>