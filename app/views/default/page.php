<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"/>
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="app/views/default/css/page.css"/>
	<link rel="stylesheet" type="text/css" href="app/views/default/css/finalizado.css"/>
	<meta charset="UTF-8">	
	<title>Proveedor | MenuPrincipal</title>
</head>
<body>
	<main class="container-fluid vertical left-block">
		<header>
			<h1>Provéeme</h1>
		</header>
		<div class="col-xs-6 col-md-4 izquierda">
			<section class="col-md-offset-4 text-center" >
				<img id="logo" src="#LOGO#">
			</section>
			<section class="col-md-offset-4 text-center botones" >
					
					<ul class="nav nav-pills nav-stacked">
		    			<li><a class="btn btn-primary center-block btn-lg btn-block" href="indexP.php?action=PLPedido">Lista de Pedidos</a></li>
		    			<li><a class="btn btn-primary center-block btn-lg btn-block" href="indexP.php?action=PMRestaurantes">Mis Restaurantes</a></li>
		    			<li><a class="btn btn-primary center-block btn-lg btn-block" href="indexP.php?action=PLProductos">Lista de Productos</a></li>
		    			<li><a class="btn btn-primary center-block btn-lg btn-block" href="indexP.php?action=PModCuenta">Modificar datos de la cuenta</a></li>
					</ul>
			</section>
			<section class="col-md-offset-4 text-center">
				<img id="casa" src="app/views/default/images/home.png">
			</section>
		</div>
		<div class=" col-sm-8 col-md-9 derecha">
			#CONTENT#
		</div>

	</main>	
			<footer class="container-fluid vertical text-center">
		<p>© 2016 por Valhala Project | <a href="http://goo.gl/x4tE2M">Florida Universitaria</a></p>
		</footer>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>		
</body>
</html>