<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"/>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="app/views/default/css/finalizado.css"/>
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">	
	<title>Proveeme | Distribucion de pedidos online</title>
</head>
<body>
	<div class="container-fluid vertical">
		<header class="row center-block">
			<h1>Provéeme</h1>
		</header>
		<div class="row center-block text-center">
			<div class="col-md-4  col-md-offset-4 text-center login">
			<span id="mensaje">listo</span>
				<form method="POST" action="index.php">
					<div class="form-group input-group-lg ">
						<label for="username"></label>
							<input class="form-control" placeholder="Nombre de usuario" type="text" name="username" value="" required>
					</div>
					<div class="form-group input-group-lg">
						<label for="password"></label>
							<input class="form-control " placeholder="Contraseña" type="password" name="password" value="" required="">
					 </div>
					 <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10 text-left">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox" name="admin" value="1"> Administrador
					        </label>
					      </div>
					    </div>
					 </div>
					 <div class="g-recaptcha" data-sitekey="6Lc0pB8TAAAAAAxV42kLAcE7TNuala8Kv-BQiyte"></div>
						<input class="btn btn-primary center-block btn-lg btn-block" type="submit" id="enviar" value="ENTRAR">
				</form>
				<a href="index.php?action=crearCuenta" class="btn btn-primary center-block btn-lg btn-block cc">Registrate</a>
			</div>
		</div>
		
		<footer class="row res">
			<p>© 2016 por Valhala Project | <a href="http://goo.gl/x4tE2M">Florida Universitaria</a></p>
		</footer>

	</div>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>