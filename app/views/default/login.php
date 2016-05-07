<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="app/views/default/css/finalizado.css"/>
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">	
	<title>Proveeme | Distribucion de pedidos online</title>
</head>
<body>
	<div class="container-fluid vertical">
		
		<header class="row center-block">
			<h1>Provéeme</h1>
		</header>
		<div class="row center-block">
			<div class="col-md-4  col-md-offset-4 text-center login">
				<form method="POST" action="./menuPrincipal.php">
					<div class="form-group input-group-lg ">
						<label for="username"></label>
							<input class="form-control" placeholder="Nombre de usuario" type="text" name="username" value="" required>
					</div>
					<div class="form-group input-group-lg">
						<label class="" for="password"></label>
							<input class="form-control " placeholder="Contraseña" type="password" name="password" value="" required="">
					 </div>
						<input class="btn btn-primary center-block btn-lg btn-block" type="submit" id="enviar" value="Entrar"></input>
				</form>
				<p class="row text-center">Si aun no tienes una cuenta, haz click <a href="modules/m_creacioncuenta.php">AQUÍ</a></p>
			</div>
		</div>
		<footer class="container-fluid vertical">
			<p>© 2016 por Valhala Project | <a href="http://goo.gl/x4tE2M">Florida Universitaria</a></p>
		</footer>
	</div>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>