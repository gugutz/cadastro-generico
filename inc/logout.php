<?php

	//start the session
	include ($sessionstartlink);

	//$_SESSION['admin'] = [];
	//$_SESSION = array();
	session_unset(); // libera todas as variaveis de session, mas nao as destroi / PARECE QUE NAO SE DEVE MAIS USAR DESDE O PHP 3 CONFIRMAR ISTO
	session_destroy(); // destroe a session completamente. forma mais segura de lo
		
//	header("Refresh: 2; location: $homelink");
	header('Refresh: 2; index.php?go=logout');
	echo $msg_logout;

?> 
