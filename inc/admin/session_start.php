<?php
	session_name('admin');
	$sessionname = session_name();

	/*session is started if you don't write this line can't use $_Session  global variable*/
	session_start();
	$_SESSION['admin'] = $adminsession;  // PHP 7 tem que usar a sessão pra registrar uma variavel, mesma que ela nao seja usada, ou a sessao nao inicia.
	

?>
