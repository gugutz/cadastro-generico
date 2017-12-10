<?php
// abre a conexão com o mysql

/*
tentar arrumar pra usar variavel nos parametros da conexao
$db_connect = new mysqli( $dbaddress, $dbuser , $dbpass , $dbname);
*/

//$dbconnect = new PDO("mysql:host=localhost;dbname=db_atlantida", "root", "manenos");


$dbconnect = new mysqli( $dbaddress, $dbuser , $dbpass , $dbname);
if ($dbconnect->connect_error) {
	echo "Error - Failed to connect to MySQL: " . $db_connect->connect_error;
	}
	
//$closeconnection;
?>
