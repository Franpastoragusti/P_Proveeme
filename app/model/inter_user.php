<?php
interface Iuser {
 public function login($nombre,$pass);
 public function registrarse($id, $nombre, $pass, $logo);
}
?>