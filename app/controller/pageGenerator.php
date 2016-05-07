<?php

function load_template($title){


	$pagina = load_page('app/views/default/page.php');
	//actualización del TITULO de la página por defecto

	return $pagina;
}


function load_page($page){
		return file_get_contents($page);
}
	
function view_page($html){
	echo $html;
}

//Relpace en page.php
function replace_content($in='/\#CONTENT\#/ms', $out,$pagina){
	return preg_replace($in, $out, $pagina);	 	
}

function replace_botones($in='/\#BOTONES\#/ms', $out,$pagina){
	return preg_replace($in, $out, $pagina);	 	
}
function replace_logo($in='/\#LOGO\#/ms', $out,$pagina){
	return preg_replace($in, $out, $pagina);	 	
}
?>