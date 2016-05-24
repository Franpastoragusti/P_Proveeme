<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="app/views/default/css/formularios.css"/>
    <meta charset="UTF-8">  
    <title>Proveeme | Sign in</title>
</head>
<body>
<div class="container-fluid">
    <header class="row text-center">
        <h1>Provéeme</h1>
        <h4>Crea tu propia cuenta</h4>
    </header>
    <form class="form-horizontal" method="POST" action="index.php">
        <fieldset>
            <legend>Datos de Usuario</legend>
            <div class="form-group">
                <label for="username" class="control-label col-xs-3">Nombre de Usuario</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="username" id="nUsuario" placeholder="Nombre de usuario" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Password" class="control-label col-xs-3">Contraseña:</label>
                <div class="col-xs-9">
                    <input type="password" class="form-control" name="password" id="Password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="confirmPassword" class="control-label col-xs-3">Confirmar contraseña:</label>
                <div class="col-xs-9">
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmar contraseña" required>
                </div>
            </div>

            <div class="form-group"><!--AÑADIR CAMPOS DE SECTOR Y PEDIDO MINIMO-->
                <label class="control-label col-xs-3">Tipo de Usuario</label>
                <div class="col-xs-2">
                    <label for="restaurante" class="radio-inline">
                        <input type="radio" name="tipoUsuario" id="restaurante" value="Restaurante" onclick="idSector.disabled=true;pedidoMin.disabled=true" required> Restaurante
                    </label>
                </div>
                <div class="col-xs-2">
                    <label for="proveedor"  class="radio-inline">
                        <input  type="radio" id="proveedor" name="tipoUsuario" value="Proveedor" onclick="idSector.disabled=false;pedidoMin.disabled=false" required> Proveedor
                    </label>
                </div>
               
            </div>
            <div class="form-group">
                <label for="idSector" class="control-label col-xs-4">Sector:</label>
                    <div class="col-xs-3">
                        <select class="form-control" name="idSector" disabled="disabled" id="idSector" required>
                            <option value="1">Carniceria</option>
                            <option value="2">Bebidas</option>
                            <option value="3">Reposteria</option>
                            <option value="4">Congelados</option>
                            <option value="5">Pescaderia</option>
                            <option value="6">Menaje</option>
                            <option value="7">Hortofruticola</option>
                            <option value="8">Lacteos</option>
                            <option value="9">Aliños</option>
                            <option value="10">Aditivos</option>
                        </select>
                    </div>
                <label for="pedidoMin" class="control-label col-xs-3">Precio pedido mínimo:</label>
                    <div class="col-xs-2">
                        <input type="number" id="pedidoMin" name="pedidoMin" class="form-control" placeholder="500" disabled="disabled" required>
                    </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Datos de la empresa</legend>
            <div class="form-group">
                <label for="empresa" class="control-label col-xs-3">Nombre Empresa:</label>
                <div class="col-xs-9">
                    <input type="text" id="empresa" name="empresa" class="form-control" placeholder="Nombre de la empresa" required>
                </div>
            </div>
            <div class="form-group">
                <label  for="cif" class="control-label col-xs-3">CIF:</label>
                <div class="col-xs-9">
                    <input type="text" name="cif" id="cif" class="form-control" placeholder="11111111B" required>
                </div>
            </div>
            <div class="form-group">
                <label for="telefono" class="control-label col-xs-3" >Teléfono:</label>
                <div class="col-xs-9">
                    <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-xs-3">Email:</label>
                <div class="col-xs-9">
                    <input type="email" name="email" id="email" class="form-control" id="inputEmail" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group">
                <label  for="cif" class="control-label col-xs-3">Logo:</label>
                <div class="col-xs-9">
                    <input type="url" name="logo" id="logo" class="form-control" placeholder="Url del logo de tu empresa" required>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Dirección</legend>
                <div class="form-group">
                    <label for="provincia" class="control-label col-xs-3">Provincia:</label>
                    <div class="col-xs-3">
                        <select class="form-control" name="provincia" id="provincia" required>
                            <option selected="selected">Valencia</option>
                            <option>Castellón</option>
                            <option>Alicante</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="localidad" class="control-label col-xs-3">Localidad:</label>
                    <div class="col-xs-9">
                        <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Localidad" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cp" class="control-label col-xs-3" >Codigo Postal:</label>
                    <div class="col-xs-9">
                        <input type="text" name="cp" id="cp" class="form-control" placeholder="CP" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="calle" class="control-label col-xs-3">Calle:</label>
                    <div class="col-xs-9">
                        <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero" class="control-label col-xs-3">Numero:</label>
                    <div class="col-xs-9">
                        <input type="number" name="numero" id="numero" class="form-control" placeholder="Número" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="control-label col-xs-3">Descripcion:</label>
                    <div class="col-xs-9">
                        <textarea rows="3" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                    </div>
                </div>

                <div class="form-group text-center">
                    <div class="col-xs-offset-3 col-xs-9">
                     <div class="g-recaptcha" data-sitekey="6Lc0pB8TAAAAAAxV42kLAcE7TNuala8Kv-BQiyte"></div>
                        <input type="submit" class="btn btn-warning" value="Enviar">
                        <input type="reset" class="btn1 btn-default" value="Limpiar">
                    </div>
                </div>
        </fieldset>
    </form>
</div>

</body>
</html>