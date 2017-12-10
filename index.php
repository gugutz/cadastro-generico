<?php
include('inc/php_variables.php'); //arquivo de configuração de todo o site


ini_set('arg_separator.input', '&,');
include ($includes . 'sql/connect_db.php'); //arquivo p/ conexão
/*

	if (isset($_SESSION)) {

	}*/
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$txt_site_title?> - Principal</title>
<link rel="shortcut icon" href="img/atl-icon.png" type="image/x-icon" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">

<div id="leftmenu">
    <?=print_r($time);?><br />
    
    <div class="menu">
	<?php

		include ($sessionstartlink);

		// Se o usuário estiver logado, incluir menu do admin...
	if( isset($_SESSION) ) {
		
		echo "logado como " . session_name(); // printa o nome da sessão atual caso o usuario esteja logado
		include($adminmenulink);

		} //endif
		
		// se nao estiver logado, aparece link do painel admin pra logar
	else {
		echo "<a href='$dashboardlink' class='menulink'>$txt_admindash</a><br />";
		} //endif
	
	// Include do menu normal
	include($usermenulink);
	?>
	</div>

</div><!-- Fim da div LEFTMENU -->

	<div id="content">
		<?php include($includes . 'site_locations.php');?> <!-- Include dos locais do site -->
	</div><!-- Fim da div CONTENT -->
	
</div><!-- Fim da div WRAPPER -->
</body>
</html>
