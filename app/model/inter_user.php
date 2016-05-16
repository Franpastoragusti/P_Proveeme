<?php
interface Iuser {
	public function registro($usuario, $pass, $logo);
	public function existo($nombre);
	public function proveOrest($id);

}
?>