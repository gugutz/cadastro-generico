<?php
$includes='inc/'; // default includes path

// se o usuario nao estiver logado, o include padrão vai ser main.php
	if (!isset($_SESSION) && !$_GET['go']) {
		include($includes . "main.php");
		}
				
switch ($_GET['cadastro']) {
//
// Parte do admin

	case "cad-cidade":
		include($includes . "admin/cadastro_cidade.php");
	break;
	case "cad-cliente":
		include($includes . "admin/cadastro_cliente.php");
	break;
	case "cad-empresa":
		include($includes . "admin/cadastro_empresa.php");
	break;
	case "cad-dpto":
		include($includes . "admin/cadastro_depto.php");
	break;
	case "cad-pgto":
		include($includes . "admin/cadastro_pagamentos.php");
	break;
	case "cad-produtos":
		include($includes . "admin/cadastro_produtos.php");
	break;
	case "cad-usuarios":
		include($includes . "admin/cadastro_usuario.php");
	break;
	}
//
// Parte do usuário comum
switch ($_GET["go"]) {
	case "home":
		include($includes . "main.php");
	break;
	case "dash":
		if (isset ($_SESSION)) {
			include($includes . "admin/dashboard.php");
			}
		
		else { 
			header("location:$loginlink");
			}
	break;
	case "login":
		include($includes . "login-auth.php");
	break;
	case "logout":
		include($includes . "logout.php");
	break;
	case "acp":
		die("<meta http-equiv='Refresh' content='1';url='index.php'>"); 
	break;
	case "show-client-atl":
		include($includes . "show_client_atl.php");
	break;
	case "show-client-rodo":
		include($includes . "show_client_rodos.php");
	break;
	case "show-client-pfisica":
		include($includes . "show_client_pfisica.php");
	break;
	case "show-cidade":
		include($includes . "show_cidade.php");
	break;
	case "show-empresa":
		include($includes . "show_empresa.php");
	break;
	case "show-dpto":
		include($includes . "show_depto.php");
	break;
	case "show-pgto":
		include($includes . "show_pagamentos.php");
	break;
	case "show-produtos":
		include($includes . "show_produtos.php");
	break;
	case "show-usuarios":
		include($includes . "show_usuario.php");
	break;
	}
	
switch($_GET['orderby']) {
	case NULL:
		$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_nome";
		$search = mysqli_query($dbconnect,$sql);
	case "id":
		$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_id";
		$search = mysqli_query($dbconnect,$sql);
	case "nome":
		$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_nome";
		$search = mysqli_query($dbconnect,$sql);
	case "cnpj":
		$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_cnpj";
		$search = mysqli_query($dbconnect,$sql);
	case "end":
		$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_end";
		$search = mysqli_query($dbconnect,$sql);
	} //endswitch
?>
