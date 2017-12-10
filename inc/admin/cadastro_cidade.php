<?php include('seguro.php'); ?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Cidade</title>
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
<script language="javascript">
function enviardados(){
	if(document.form1.cidade.value == ""){
	alert("Favor Preencher a Cidade");
	document.form1.cidade.focus();
	return false;
	}
	if(document.form1.uf.value == ""){
	alert("Favor Escolher um Estado");
	document.form1.uf.focus();
	return false;
	}
return true;
}
</script>
</head>

<body>
<?
if ($_POST['enviar'])
{
include ('../sql/connect_db');

$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$sql = "SELECT descricao, uf FROM cidade WHERE descricao='$cidade' AND uf='$uf'";//faz uma consulta no banco de dados onde o campo nome_usuarios é igual a variável $nome, pra ver se o usuario ja esta cadastrado
$busca = mysql_query($sql);

$existe = mysql_num_rows($busca);//retorna o numero de linhas onde o nome_usuarios é igual a $nome

if ($existe > 0)//se $exite, ou seja, o numero de linhas de iguadades for maior que 0, ele aparece um erro e nao executa o resto do script, cadastrando assim o usuario que ja está cadastrado
{
?><script language="javascript">alert("Cidade já Cadastrada");</script><?
}
else
{
$sql = "INSERT INTO cidade(descricao, uf) VALUES ('$cidade', '$uf')";

$inserir = mysql_query($sql);

if($inserir)
{ ?><script language="javascript">alert("Cidade Cadastrada com Sucesso");</script><?
}else{echo "Erro: ".mysql_error();}}}?>

<form id="form1" name="form1" onsubmit="return enviardados();" method="post" action="">
  <table width="344" align="center" cellspacing="2">
    <tr>
      <td colspan="2" align="center"><span class="style1">Cadastro de Cidades </span></td>
    </tr>
    <tr>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td width="124" align="right">Nome da Cidade: </td>
      <td width="204" align="left"><label>
        <input name="cidade" type="text" id="cidade" size="30" maxlength="30" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Estado:</td>
      <td align="left"><select name="uf" id="uf">
        <option selected="selected">UF</option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
            </select></td>
    </tr>
    
    <tr>
      <td height="26" colspan="2" align="center"><label>
        <input name="enviar" type="submit" id="enviar" value="Cadastrar" />
&nbsp;      </label>
        <label>
         <input name="Limpar" type="reset" id="Limpar" value="Limpar" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
