<?PHP
function conectate(){

		$serverName = "WALASTRE_LAPTO\MSSQLSERVER2014"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"AESIGESP", 
								 "UID"	   =>"sa", 
								 "PWD"	   =>"sql2008SA"
								 );	
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
		if( $conn  == false) {
			 echo "Conexi�n no se pudo establecer.<br />";
			 die( print_r( sqlsrv_errors(), true));		 
		}else{
			return $conn;
		}

}
//conectate();
?>
