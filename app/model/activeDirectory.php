<html>
<?php
    $adServer = "ldap://10.2.72.199";	
	
    $ldap = ldap_connect($adServer);
    $username = 'Administrador';    
    $password = 'Proveeme.florida';
  
    $ldaprdn = 'ProveemeWServer' . "\\" . $username;
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap, $ldaprdn, $password);
    if ($bind) {		
    	





           	
    } else {
        $msg = "Usuario o contraseña incorrectos";        
    }
    echo $msg;
    ldap_close();
 ?>
</html>