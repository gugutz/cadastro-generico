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
	if(document.form1.doc.value == ""){
	alert("Favor Preencher o Endere�o");
	document.form1.end.focus();
	return false;
	}
	if(document.form1.end.value == ""){
	alert("Favor Preencher o Endere�o");
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
	alert("Favor Preencher o Telefone Corretamente!\nSomente n�meros s�o permitidos!");
	document.form1.telefone.focus();
	return false;
	}
	if(document.form1.senha.value == ""){
	alert("Favor Preencher a Senha");
	document.form1.senha.focus();
	return false;
	}
	if(document.form1.confirma.value == ""){
	alert("Campo de confirma��o de senha � obrigat�rio");
	document.form1.confirma.focus();
	return false;
	}
	if(document.form1.senha.value != document.form1.confirma.value){
	alert("Confirma��o de Senha Incorreta");
	document.form1.confirma.focus();
	return false;
	}
return true;
}
</script>
</head>

<body>
<?
if ($_POST['enviar'])  // Primeiro IF
{
include ($includes . 'sql/connect_db.php'); //arquivo p/ conex�o

$nome = $_POST['nome'];
$end = $_POST['end'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "SELECT cl_mail FROM clients WHERE cl_mail='$email'";//faz uma consulta no banco de dados onde o campo nome_usuarios � igual a vari�vel $nome, pra ver se o usuario ja esta cadastrado

$busca = mysqli_query($sql);

$existe = mysql_num_rows($busca);//retorna o numero de linhas onde o nome_usuarios � igual a $nome

if ($existe > 0)//se $existe, ou seja, o numero de linhas de igualdades for maior que 0, ele aparece um erro e nao executa o resto do script, nao cadastrando assim um usuario que ja est� cadastrado
{
?><script language="javascript">alert("E-mail j� Cadastrado");</script><?
}
else
{
$sql = "INSERT INTO clientes(cl_nome, cl_cnpj, cl_end, cl_bairro, cl_mail, cl_fone, cl_cidade, cl_password) VALUES ('$nome', '$doc', '$end', '$bairro', '$email', '$telefone', '$cidade', '$senha')";


$inserir = mysql_query($sql);
$id = mysql_insert_id();
if($inserir)
{ ?><script language="javascript">alert("Cadastro Efetuado\nUma Mensagem foi enviada para seu email,\npara confirma��o");</script><?

$headers = "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "FROM: Atl�ntida Alum�nio - contato@atlantidaaluminio.com.br\n";
$headers .= "CCO: cco@atlantidaaluminio.com.br";
$email2 = md5($email);
$msg = "$nome, confirme seu cadastro em nosso site.<br />
<br />
Para finalizar o seu cadastro na Atl�ntida Alum�nio, voc� dever� confirmar o seu endere�o de email.<br />
Clique no link abaixo para efetuar a confirma��o.<br />
<br />
<a href='http://www.atlantidaaluminio.com.br/cadastro/confirmacao.php?id=$id&email=$email2'>Clique aqui para confirmar e ativar o seu cadastro.</a><br>
<br />
Obrigado pela prefer�ncia.<br>
<br>
Atenciosamente,<br />
Atl�ntida Alum�nio.";

ini_set('sendmail_from', 'contato@atlantidaaluminio.com.br'); // Workaround for the SMPT server error on Windows. This avoids making changes in php.ini file
mail($email, "Confirma��o de Cadastro", $msg, $headers);
	}
else {
	echo "Erro: ".mysql_error();
	}
} // end do primeiro Else, onde grava os dados
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
      <td width="73">CPF:</td>
      <td width="154"><label>
        <input name="doc" type="text" id="doc" maxlength="35" />
      </label></td>
    </tr>

    <tr>
      <td>Endere&ccedil;o:</td>
      <td><label>
        <input name="end" type="text" id="end" maxlength="30" />
      </label></td>
    </tr>
    <tr>
      <td>Bairro:</td>
      <td><label>
        <input name="bairro" type="text" id="bairro" maxlength="35" />
      </label></td>
    </tr>
    
    <tr>
      <td>Cidade:</td>
      <td>
      <label>
      <select name="cidade">
<?php
include ($includes . 'sql/connect_db.php'); //arquivo p/ conex�o
$sql = "SELECT id, descricao FROM cidades ORDER BY descricao";
$busca = mysql_query($sql);
while ($lista = mysql_fetch_array($busca)){?>
<option value="<?=$lista['id']; ?>">
<?=$lista['descricao']; ?></option>
<? } ?></select>
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
      <td>Tipo:</td>
      <td>
      <label>
      <select name="tipo">
      <option value="<?=$lista['id']; ?>">
<?=$lista['descricao']; ?></option>
<? } ?></select>
      </label>
      </td>
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
