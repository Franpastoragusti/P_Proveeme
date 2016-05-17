<ul class="nav nav-pills nav-stacked">
	<li><button type="button" class="btn btn-primary center-block btn-lg btn-block" data-toggle="modal" data-target="#myModal">
	  AñadirProducto
	</button></li>
	<li><button type="button" class="btn btn-primary center-block btn-lg btn-block" data-toggle="modal" data-target="#quitar">
	  Quitar Producto
	</button></li>
</ul>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content medium">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Añade un producto</h4>
      </div>
      <div class="modal-body">
				<form class="form-horizontal" method="POST" action="index.php">
				        <div class="form-group">
				           	<label for="nombreProd" class="control-label col-xs-3">Producto</label>
				            <div class="col-xs-9">
				                <input type="text" class="form-control" name="nombreProd" id="nombreProd" placeholder="Nombre del producto" required>
				            </div>
				        </div>
				        <div class="form-group">
				           	<label for="idSector" class="control-label col-xs-4">Medida</label>
			                    <div class="col-xs-5">
			                        <select class="form-control" name="idSector" id="idSector" required>
			                            <option value="kg">Kilogramos</option>
			                            <option value="litros">Litros</option>
			                            <option value="caja">Caja</option>
			                            <option value="pack de 12">Pack de 12</option>
			                            <option value="pack de 24">Pack de 24</option>
			                        </select>
			                    </div>
				        </div>
				        <div class="form-group">
				            <label for="precio" class="control-label col-xs-3">Precio</label>
			              	<div class="col-xs-9">
			                    <input type="text" class="form-control" name="precio" id="precio" placeholder="€">
			                </div>
			            </div>
				        <div class="form-group">
				            <label for="idSector" class="control-label col-xs-4">Tipo de Producto</label>
			                    <div class="col-xs-5">
			                        <select class="form-control" name="idSector" id="idSector" required>
			                            <option value="1">Carnicería</option>
			                            <option value="2">Bebidas</option>
			                            <option value="3">Repostería</option>
			                            <option value="4">Congelados</option>
			                            <option value="5">Pescadería</option>
			                            <option value="6">Menaje</option>
			                            <option value="7">Hortofrutícola</option>
			                            <option value="8">Lácteos</option>
			                            <option value="9">Aliños</option>
			                            <option value="10">Aditivos</option>
			                        </select>
			                    </div>
			            </div>
					    <div class="modal-footer">
					                    <div class="col-xs-offset-3 col-xs-9">
					                        <input type="submit" class="btn btn-principal" value="Enviar">
					                    </div>
					    </div>
			    </form>
      </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="quitar" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Elimina un producto</h4>
      </div>
      <div class="modal-body">
				<form class="form-horizontal" method="POST" action="index.php">
				        <div class="form-group">
				           	<label for="idProducto" class="control-label col-xs-3">Nº de Producto</label>
				            <div class="col-xs-9">
				                <input type="number" class="form-control" name="idProducto" id="idProducto" placeholder="Nombre del producto" required>
				            </div>
				        </div>
				        <div class="modal-footer">
					        <div class="col-xs-offset-3 col-xs-9">
				                <input type="submit" class="btn btn-principal" value="Enviar">
		                    </div>
					    </div>
			    </form>
      </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->