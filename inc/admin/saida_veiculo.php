<?php
include ($includes . 'sql/connect_db.php'); //arquivo p/ conexão
include('seguro.php');
include($includes . 'php_variables.php');
$includes='../inc/';  //Includes path
?>

<script language="javascript">
function enviardados(){
	if(document.form1.nome.value == ""){
	alert("Favor Preencher o Nome");
	document.form1.nome.focus();
	return false;
	}
	if(document.form1.veiculo.value == ""){
	alert("Favor Preencher o Endereço");
	document.form1.end.focus();
	return false;
	}
	if(document.form1.saida.value == ""){
	alert("Favor Preencher o Endereço");
	document.form1.end.focus();
	return false;
	}
	if(document.form1.chegada.value == ""){
	alert("Favor Preencher a Chegada");
	document.form1.bairro.focus();
	return false;
	}
return true;
}
</script>
</head>

<body>
<?php
if ($_POST['saida'])  // Primeiro IF
{
$nome = $_POST['nome'];
$veiculo = $_POST['veiculo'];
$saida = $localtime;
$chegada = $localtime;


$sql = "SELECT cl_mail FROM funcionarios WHERE cl_mail='$email'";

$busca = mysql_query($sql);

$existe = mysql_num_rows($busca);//retorna o numero de linhas onde o nome_usuarios é igual a $nome

if ($existe > 0)//se $existe, ou seja, o numero de linhas de igualdades for maior que 0, ele aparece um erro e nao executa o resto do script, nao cadastrando assim um usuario que ja está cadastrado
{
?><script language="javascript">alert("E-mail já Cadastrado");</script><?
}
else
{
$sql = "INSERT INTO controle_veiculos(nome, veiculos, chegada) VALUES ('$nome', '$veiculo', '$localtime', '$bairro', '$email', '$telefone', '$cidade', '$senha')";

$inserir = mysql_query($sql);
$id = mysql_insert_id();
} // fim do primeiro IF
?>

<form id="form1" name="form1" onSubmit="return enviardados()" method="post" action="cadastro_cliente.php">
  <table width="400px" border="0" align="center" cellspacing="2">
    <tr>
      <td colspan="2" align="center"><span class="style1">Cadastro de Clientes </span></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="73">Nome:</td>
      <td width="154"><label>
        <input name="nome" type="text" id="nome" maxlength="35" />
      </label></td>
    </tr>
    <tr>
      <td width="73">Ve&iacute;culo:</td>
      <td width="154"><label>
        <input name="veiculo" type="text" id="veiculo" maxlength="35" />
      </label></td>
    </tr>

    <tr>
      <td>Cidade:</td>
      <td><label>
      <select name="veiculo">
      
<?php

include ($includes . 'sql/connect_db.php'); //arquivo p/ conexão
$sql = "SELECT id, descricao FROM controle_veiculos ORDER BY name";
$busca = mysql_query($sql);

while ($lista = mysql_fetch_array($busca)){?>
<option value="<?=$lista['id']; ?>">
<?=$lista['descricao']; ?></option>
<? } ?></select>
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input name="enviar" type="submit" id="enviar" value="Registrar Saída" /> 
&nbsp;      </label>
        <label>
        <input name="limpar" type="submit" id="limpar" value="Registrar Chegada" />
      </label></td>
    </tr>
  </table>
  <p align="center" class="style3">*preencher o telefone somente com n&uacute;meros </p>
</form>