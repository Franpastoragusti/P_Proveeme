<html>
<?php
    $adServer = "ldap://10.2.72.116";	
	
    $ldap = ldap_connect($adServer);
    $username = 'Administrador';    
    $password = 'Proveeme.florida';
  
    $ldaprdn = 'ProveemeWServer2012.com' . "\\" . $username;
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap, $ldaprdn, $password);
    if ($bind) {		
    	$msg = "Estás logueado como correctamente como $username";    	
    } else {
        $msg = "Usuario o contraseña incorrectos";        
    }
    echo $msg;
    ldap_close();
 ?>
</html>