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
</head>

<body>
<?
if ($_POST['enviar']){
include ('../sql/connect_db');
$nome = $_POST['nome'];

$sql = "SELECT descricao_depto FROM depto WHERE descricao_depto='$nome'";//faz uma consulta no banco de dados onde o campo nome_usuarios é igual a variável $nome, pra ver se o usuario ja esta cadastrado
$busca = mysql_query($sql);

$existe = mysql_num_rows($busca);//retorna o numero de linhas onde o nome_usuarios é igual a $nome

if ($existe > 0)//se $exite, ou seja, o numero de linhas de iguadades for maior que 0, ele aparece um erro e nao executa o resto do script, cadastrando assim o usuario que ja está cadastrado
{
?><script language="javascript">alert("Departamento já Cadastrado");</script><?
}
else
{
$sql = "INSERT depto(descricao_depto) VALUES ('$nome')";
$inserir = mysql_query($sql);

if($inserir)
{ ?><script language="javascript">alert("Departamento Cadastrado com Sucesso");</script><?
}else{echo "Erro: ".mysql_error();}}}?>

<form id="form1" name="form1" onSubmit="return enviardados();" method="post" action="">
  <table width="253" border="0" align="center">
    <tr>
      <td colspan="2" align="center"><span class="style2">Cadastro de Departamentos </span></td>
    </tr>
    <tr>
      <td width="89">&nbsp;</td>
      <td width="147">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Departamento:</td>
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

