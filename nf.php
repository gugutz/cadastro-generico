<?php
$includes='inc/';  //Includes path
include($includes . 'sql/connect_db.php'); //arquivo p/ conexão
$get_id=$_GET['id'];
$sql="select * from clientes where cl_id='$get_id'";
$search=mysql_query($sql);

// Date and Time formats
$date_=date("D M j G:i:s T Y"); // Sat Mar 10 15:16:08 MST 2001
$date_dd_mm_yyyy=date("j / n / Y"); // dd / m / YYYY
$time_hh_mm_ss=date("H:i:s"); // hh:mm:ss
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Projeto Atlantida - Detalhes do Cliente</title>
<link rel="shortcut icon" href="img/atl-icon.png" type="image/x-icon" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<table id="cl_detail_table" cellpadding='4'>
<?php
// 'Fatiando' a array e dividindo ela pra aprensentar
while($cliente=mysql_fetch_array($search))
	{
echo "<tr>";
echo   "<td>DESTINATÁRIO / REMETENTE</td>";
echo "</tr>";
echo "<tr>";
echo   "<td colspan='4'><span class='cl-table-td-header'>NOME/RAZÃO SOCIAL</span></span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_nome]</span></td>";
echo   "<td><span class='cl-table-td-header'>CNPJ</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_cnpj]</span></td>";
echo   "<td><span class='cl-table-td-header'>DATA DA EMISSÃO</span><br />";
echo   "<span class='cl-table-td-content'>$date_dd_mm_yyyy</span></td>";
echo "</tr>";
echo "<tr>";
echo   "<td colspan='3'><span class='cl-table-td-header'>ENDEREÇO</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_end]</span></td>";
echo   "<td><span class='cl-table-td-header'>BAIRRO/DISTRITO</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_bairro]</span></td>";
echo   "<td><span class='cl-table-td-header'>CEP</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_cep]</span></td>";
echo   "<td><span class='cl-table-td-header'>DATA SAÍDA/ENTRADA</span><br />";
echo   "<span class='cl-table-td-content'>$date_dd_mm_yyyy</span></td>";
echo "</tr>";
echo "<tr>";
echo   "<td><span class='cl-table-td-header'>MUNICÍPIO</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_cidade]</span></td>";
echo   "<td colspan='2'><span class='cl-table-td-header'>FONE/FAX</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_fone1]</span></td>";
echo   "<td><span class='cl-table-td-header'>UF</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_uf]</span></td>";
echo   "<td><span class='cl-table-td-header'>INSCRIÇÃO ESTADUAL</span><br />";
echo   "<span class='cl-table-td-content'>$cliente[cl_ie]</span></td>";
echo   "<td><span class='cl-table-td-header'>HORA DA SAÍDA</span><br />";
echo   "<span class='cl-table-td-content'>$time_hh_mm_ss</span></td>";
echo "</tr>";
	}
?>
 </table>

    
   
  
   
  
 
