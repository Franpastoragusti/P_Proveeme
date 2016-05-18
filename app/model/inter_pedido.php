<?php
interface Ipedido {
	// public function precioTotal($idPedido);

	 public function verProductosPedido($idPedido,$id);
	 
	 public function verDatosRestaurantePedido($idRestaurante);

	public function precioTotalPedido($idPedido);

}
?>