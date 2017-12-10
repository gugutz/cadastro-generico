<?php
	
	// resume a sessão previamente iniciada
	include ($sessionstartlink);
	
	if ( !isset($_SESSION) ) {
		// se a sessao nao estiver criada, redireciona pra pagina de login
		header("Refresh: 2; location:$loginlink");
	    echo ($msg_notloggedin); 

	}
/*	else {
	    	    echo ($msg_loginsuccess); 
	   	echo session_name(); 
	} //endif
	
*/
?>
