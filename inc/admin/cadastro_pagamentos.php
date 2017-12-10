<?php
include('seguro.php');
?>


<script language="javascript">
function enviardados(){
	if(document.form1.nome.value == ""){
	alert("Campo Obrigatório");
	document.form1.nome.focus();
	return false;
	}
return true;
}
</script>



<?
if ($_POST['enviar']){
include ('../sql/connect_db');
$nome = $_POST['nome'];

$sql = "SELECT descricao_pagto FROM tipo_pagto WHERE descricao_pagto='$nome'";//faz uma consulta no banco de dados onde o campo nome_usuarios é igual a variável $nome, pra ver se o usuario ja esta cadastrado
$busca = mysql_query($sql);

$existe = mysql_num_rows($busca);//retorna o numero de linhas onde o nome_usuarios é igual a $nome

if ($existe > 0)//se $exite, ou seja, o numero de linhas de iguadades for maior que 0, ele aparece um erro e nao executa o resto do script, cadastrando assim o usuario que ja está cadastrado
{
?><script language="javascript">alert("Tipo de Pagamento já Cadastrado");</script><?
}
else
{
$sql = "INSERT tipo_pagto(descricao_pagto) VALUES ('$nome')";
$inserir = mysql_query($sql);

if($inserir)
{ ?><script language="javascript">alert("Tipo de Pagamento Cadastrado com Sucesso");</script><?
}else{echo "Erro: ".mysql_error();}}}?>

<form id="form1" name="form1" onsubmit="return enviardados();" method="post" action="">
  <table width="283" border="0" align="center">
    <tr>
      <td colspan="2" align="center"><span class="style2">Cadastro dos Tipos de Pagamentos </span></td>
    </tr>
    <tr>
      <td width="91">&nbsp;</td>
      <td width="182">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Pagamento:</td>
      <td align="left"><input name="nome" type="text" id="nome" maxlength="20" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input name="enviar" type="submit" id="enviar" value="Enviar" />
&nbsp; </label>
        <label>
        <input name="Limpar" type="reset" id="Limpar" value="Limpar" />
        </label>
        <label></label></td>
    </tr>
  </table>
</form>

