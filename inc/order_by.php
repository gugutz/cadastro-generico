<?php
$includes='inc/';  //Includes path
include ($includes . 'sql/connect_db.php'); //arquivo p/ conexão
switch ($_GET['orderby']) {
//
// Parte do admin
case "id":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_id";
$search=mysql_query($sql);
break;
case "nome":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_nome";
$search=mysql_query($sql);
break;
case "cnpj":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_cnpj";
$search=mysql_query($sql);
break;
case "endereco":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_end";
$search=mysql_query($sql);
break;
case "bairro":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_bairro";
$search=mysql_query($sql);
break;
case "cep":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_cep";
$search=mysql_query($sql);
break;
case "cidade":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_cidade";
$search=mysql_query($sql);
break;
case "fone1":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_fone1";
$search=mysql_query($sql);
break;
case "fone2":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_fone2";
$search=mysql_query($sql);
break;
case "uf":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_uf";
$search=mysql_query($sql);
break;
case "ie":
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_ie";
$search=mysql_query($sql);
break;
default:
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_nome";
$search=mysql_query($sql);
break;
}
//$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_nome";
//$search=mysql_query($sql);
?>