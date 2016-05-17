<ul class="nav nav-pills nav-stacked">
	<li><a class="btn btn-primary center-block btn-lg btn-block" href="index.php?action=RLPedido">Lista de Pedidos</a></li>
	<li><button type="button" class="btn btn-primary center-block btn-lg btn-block" data-toggle="modal" data-target="#contenidoPedido">
	  Contenido de los pedidos
	</button></li>
	<li><button type="button" class="btn btn-primary center-block btn-lg btn-block" data-toggle="modal" data-target="#HacerPedido">
	  Haz un pedido
	</button></li>
</ul>

<div class="modal fade" id="contenidoPedido" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content small">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title tittle">Introduce el ID del Pedido</h4>
      </div>
      <div class="modal-body">
				<form class="form-horizontal" method="POST" action="index.php">
				        <div class="form-group">
				           	<label for="idPedidoBuscado" class="control-label col-xs-3">ID del pedido</label>
				            <div class="col-xs-9">
				                <input type="text" class="form-control" name="idPedidoBuscado" id="idPedidoBuscado" required>
				            </div>
				        </div>
						<div class="modal-footer">
							<div class="col-xs-offset-3 col-xs-9">
						       	<input type="submit" class="btn btn-principal" value="Ver los poductos">
				          	 </div>
						</div>
			    </form>
      		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="HacerPedido" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content small">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title tittle">Introduce el Nombre del Proveedor</h4>
      </div>
      <div class="modal-body">
				<form class="form-horizontal" method="POST" action="index.php">
				        <div class="form-group">
				           	<label for="idProveedorSeleccionado" class="control-label col-xs-3">Nombre del Proveedor</label>
				            <div class="col-xs-9">
				                <input type="text" class="form-control" name="idProveedorSeleccionado" id="idProveedorSeleccionado" required>
				            </div>
				        </div>
						<div class="modal-footer">
							<div class="col-xs-offset-3 col-xs-9">
						       	<input type="submit" class="btn btn-principal" value="Ver los poductos">
				          	 </div>
						</div>
			    </form>
      		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->