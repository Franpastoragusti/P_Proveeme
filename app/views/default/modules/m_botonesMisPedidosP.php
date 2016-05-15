<ul class="nav nav-pills nav-stacked">
	<li><a class="btn btn-primary center-block btn-lg btn-block" href="index.php?action=PLPedido">Lista de pedidos</a></li>
	<li><button type="button" class="btn btn-primary center-block btn-lg btn-block" data-toggle="modal" data-target="#modificar">
	  Modificar Estado del pedido
	</button></li>
	<li><button type="button" class="btn btn-primary center-block btn-lg btn-block" data-toggle="modal" data-target="#contenidoPedido">
	  Contenido de los pedidos
	</button></li>
</ul>



<div class="modal fade" id="contenidoPedido" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content small">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Introduce el ID del Pedido</h4>
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

<!--FUNCION PARA MODIFICAR EL ESTADO DE UN PEDIDO-->
<div class="modal fade" id="modificar" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content medium">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modifica el pedido</h4>
      </div>
      <div class="modal-body">
				<form class="form-horizontal" method="POST" action="index.php">
				        <div class="form-group">
				           	<label for="idPedido" class="control-label col-xs-3">ID</label>
				            <div class="col-xs-9">
				                <input type="number" class="form-control" name="idPedido" id="idPedido" required>
				            </div>
				        </div>
						<div class="form-group">
				            <label for="estado" class="control-label col-xs-4">Estado</label>
			                    <div class="col-xs-6">
			                        <select class="form-control" name="estadoPedido" id="estado" required>
			                            <option value="Aceptado">Aceptado</option>
			                            <option value="Rechazado">Rechazado</option>
			                        </select>
			                    </div>
			            </div>
				         <div class="form-group">
				           	<label for="hora" class="control-label col-xs-3">Hora de entrega</label>
				            <div class="col-xs-9">
				                <input type="time" class="form-control" name="hora" id="hora" required>
				            </div>
				        </div>
				         <div class="form-group">
				           	<label for="fecha" class="control-label col-xs-3">Fecha de entrega</label>
				            <div class="col-xs-9">
				                <input type="text" class="form-control" name="fecha" id="fecha" placeholder="0000-00-00" required>
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