<?php
interface Irestaurante {
 	public function verListaPedidos($idRestaurante);
//	public function enviarPedido($idPedido,$precioTotalPedido,$hora,$estado,$idRestaurante,$idProveedor,$idPedido);
	public function verListaProveedores($idRestaurante);
	public function verProveedoresPorSector($idSector);

}
?>