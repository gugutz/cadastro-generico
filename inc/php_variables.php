<?php
global $adminsession;
$siteroot = '/home/gustavo/www/html/projeto_cadastro/';
$includes = $siteroot . 'inc/'; // default includes path
$indexfile = 'index.php';


$dbaddress='localhost';
$dbuser='root';
$dbpass='manenos';
$dbname='db_atlantida';
$closeconnection = 	'$dbconnect->close()';



$favicon='img/atl-icon.png';
// Date and Time formats
$date_full=date("D M j G:i:s T Y"); // Sat Mar 10 15:16:08 MST 2001
$date=date("j/n/Y"); // dd / m / YYYY
$date_dd_mm_yyyy=date("j / n / Y"); // dd / m / YYYY
$time=date("H:i:s"); // hh:mm:ss
$time_hh_mm_ss=date("H:i:s"); // hh:mm:ss

// links do site

$sessionstartlink = $includes . 'admin/session_start.php';
$adminmenulink = $includes . 'admin/admin_menu.php';
$usermenulink = $includes . 'user_menu.php';
$dashboardlink = $indexfile . '?go=dash';
$loginlink = $indexfile . '?go=login';
$logoutlink = $indexfile . '?go=logout';
$homelink = $indexfile . '?go=home';


//$ffff = "index.php?go=home";
//$homelsdfsdfink = "index.php?go=home";
//$sdfsdf = "index.php?go=home";
//$homelink = "index.php?go=home";
//$homelink = "index.php?go=home";
//$sdfs = "index.php?go=home";
//$ryurei = "index.php?go=home";
//$sdfsdf = "index.php?go=home";
//$jyhhgj = "index.php?go=home";
//$rqewr = "index.php?go=home";
//$hjk = "index.php?go=home";
//$cgdfg = "index.php?go=home";
// Nomes e textos ao redor do site, para facilitar a tradução do sistema

// Site Title
$txt_site_title = 'Projeto Atlântida';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
//$txt_admindash = 'Painel Admin';
$txt_loginlink = 'Entrar como admin';
$txt_admindash = 'Painel Admin';
$txt_logoutbtn =  'Deslogar';
$msg_alreadyloggedin = "Você já está logado como $sessionname!";
$msg_loggedasadmin = "<p>Você está logado como administrador.</p>";
$msg_notloggedin = 'Você não está logado!';
$msg_loginfail = "<p>O login falhou, tente novamente</p>";
$msg_loginsuccess = "O login foi bem sucedido, você tem privilégios de admin.";
$msg_logout = "Saindo do modo Administrador....";
?>
