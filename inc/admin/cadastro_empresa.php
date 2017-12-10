<?php
include('seguro.php');
?>

<script language="javascript">
function enviardados(){
	if(document.form1.nome.value == ""){
	alert("Favor Preencher o Nome");
	document.form1.nome.focus();
	return false;
	}
	if(document.form1.end.value == ""){
	alert("Favor Preencher o Endereço");
	document.form1.end.focus();
	return false;
	}
	if(document.form1.bairro.value == ""){
	alert("Favor Preencher o Bairro");
	document.form1.bairro.focus();
	return false;
	}
	if(document.form1.cidade.value == ""){
	alert("Favor Escolher a Cidade");
	document.form1.cidade.focus();
	return false;
	}
	if(document.form1.email.value == "" || document.form1.email.value.indexOf("@")==-1 || document.form1.email.value.indexOf(".")==-1){
	alert("Favor Preencher o E-mail Corretamente");
	document.form1.email.focus();
	return false;
	}
	if(document.form1.telefone.value == "" || isNaN(document.form1.telefone.value)){
	alert("Favor Preencher o Telefone Corretamente!\nSomente números são permitidos!");
	document.form1.telefone.focus();
	return false;
	}
	if(document.form1.senha.value == ""){
	alert("Favor Preencher a Senha");
	document.form1.senha.focus();
	return false;
	}
	if(document.form1.confirma.value == ""){
	alert("Campo de confirmação de senha é obrigatório");
	document.form1.confirma.focus();
	return false;
	}
	if(document.form1.senha.value != document.form1.confirma.value){
	alert("Confirmação de Senha Incorreta");
	document.form1.confirma.focus();
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

$nome = $_POST['nome'];
$end = $_POST['end'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "SELECT email FROM clientes WHERE email='$email'";//faz uma consulta no banco de dados onde o campo nome_usuarios é igual a variável $nome, pra ver se o usuario ja esta cadastrado

$busca = mysql_query($sql);

$existe = mysql_num_rows($busca);//retorna o numero de linhas onde o nome_usuarios é igual a $nome

if ($existe > 0)//se $exite, ou seja, o numero de linhas de iguadades for maior que 0, ele aparece um erro e nao executa o resto do script, cadastrando assim o usuario que ja está cadastrado
{
?><script language="javascript">alert("E-mail já Cadastrado");</script><?
}
else
{
$sql = "INSERT INTO clientes(nome_cliente, endereco_cliente, bairro_cliente, email, telefone, cidade_cliente, senha) VALUES ('$nome', '$end', '$bairro', '$email', '$telefone', '$cidade', '$senha')";

$inserir = mysql_query($sql);
$id = mysql_insert_id();
if($inserir){	?>
	<script language="javascript">alert("Cadastro Efetuado\nUma Mensagem foi enviada para seu email,\npara confirmação");</script>
	<?php



}else{echo "Erro: ".mysql_error();}}}
?>

<form id="form1" name="form1" onSubmit="return enviardados()" method="post" action="cadastro_empresa.php">
  <table width="400" border="0" align="center" cellspacing="2">
    <tr>
      <td colspan="2" align="center"><span class="style1">Cadastro de Empresas </span></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="73">Nome:</td>
      <td width="154">
      <label>
        <input name="nome" type="text" id="nome" maxlength="35" />
      </label>
      </td>
    </tr>
    <tr>
      <td>Endere&ccedil;o:</td>
      <td>
      <label>
        <input name="end" type="text" id="end" maxlength="30" />
      </label>
      </td>
    </tr>
    <tr>
      <td>Bairro:</td>
      <td>
      <label>
        <input name="bairro" type="text" id="bairro" maxlength="35" />
      </label></td>
    </tr>
    <tr>
      <td>Cidade:</td>
      <td>
      <label>
        <select name="cidade">
<?
include ('../sql/connect_db');

$sql = "SELECT id, descricao FROM cidade ORDER BY descricao";
$busca = mysql_query($sql);

while ($lista = mysql_fetch_array($busca)){?>
<option value="<?=$lista['id']; ?>">
<?=$lista['descricao']; ?>
</option>
<? } ?>
</select>
      </label>
      </td>
    </tr>
    <tr>
      <td>E-mail:</td>
      <td><label>
        <input name="email" type="text" id="email" maxlength="40" />
      </label></td>
    </tr>
    <tr>
      <td>Telefone*:</td>
      <td><label>
        <input name="telefone" type="text" id="telefone" maxlength="11" />
      </label></td>
    </tr>
    <tr>
      <td>Senha:</td>
      <td><label>
        <input name="senha" type="password" id="senha" size="6" maxlength="6" />
        <span class="style3">*m&aacute;x 6 caracteres</span> </label></td>
    </tr>
    <tr>
      <td>Confirmar:</td>
      <td><input name="confirma" type="password" id="confirma" size="6" maxlength="6" />
        <span class="style3">*m&aacute;x 6 caracteres</span> </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input name="enviar" type="submit" id="enviar" value="Enviar" /> 
&nbsp;      </label>
        <label>
        <input name="limpar" type="reset" id="limpar" value="Limpar" />
      </label></td>
    </tr>
  </table>
  <p align="center" class="style3">*preencher o telefone somente com n&uacute;meros </p>
</form>

