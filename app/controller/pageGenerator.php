<?php

function load_template($title){


	$pagina = load_page('app/views/default/page.php');
	//actualización del TITULO de la página por defecto
	//1. reemplazo lo que hay en $titulo (parametro entrada) por la etiqueta #TITLE# que aparece en $pagina
	$pagina = replace_content('/\#TIPOEMPRESA\#/ms' ,$title , $pagina);	
	//Ya tengo mi página guardada en la variable $pagina y la devuelvo
	return $pagina;
}


function load_page($page){
		return file_get_contents($page);
}
	
function view_page($html){
	echo $html;
}

//Relpace en page.php
function replace_content($in='/\#TABLA\#/ms', $out,$pagina){
	return preg_replace($in, $out, $pagina);	 	
}

function replace_botones($in='/\#BOTONES\#/ms', $out,$pagina){
	return preg_replace($in, $out, $pagina);	 	
}
function replace_logo($in='/\#LOGO\#/ms', $out,$pagina){
	return preg_replace($in, $out, $pagina);	 	
}
?>