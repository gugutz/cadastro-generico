<?php
$includes='inc/'; //Includes path
include($includes . 'php_variables.php'); // arquivo de configuração global do site
include('inc/admin/seguro.php');


?>
		
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$site_title?> .:. Painel de controle .:. Administrador</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>

<div id="leftmenu">
    <?=print_r($date); print(', '); print_r($time);?><br />
    <div class="menu">

	<?php
		// Se o usuário estiver logado, incluir menu do admin.
		if(isset($_SESSION['usuario']))
		{
		include($includes . 'admin_menu.php');
		}
	?>
    </div><!-- Fim da class MENU -->
    <div class="menu">    
    <?php
		// Include do menu normal
		include($includes . 'user_menu.php');
	?>
	</div><!-- Fim da class MENU -->
</div><!-- Fim da div LEFTMENU -->

<div id="content">
<?php
include($includes . "site_locations.php");
?>

</div>



</body>
</html>
