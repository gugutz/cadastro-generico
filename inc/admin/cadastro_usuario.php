<?php
include('seguro.php');
?>


<script language="javascript"> /* validação do formulário*/
function enviardados()
{
	if(document.form1.nome.value == "")
	{
	alert("Campo Nome é obrigatório");
	document.form1.nome.focus();
	return false;
	}
	
	if(document.form1.senha.value == "")
	{
	alert("Campo Senha é obrigatório");
	document.form1.senha.focus();
	return false;
	}
	
	if(document.form1.confirma.value == "")
	{
	alert("Campo de confirmação de senha é obrigatório");
	document.form1.confirma.focus();
	return false;
	}
	
	if(document.form1.senha.value != document.form1.confirma.value)
	{
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
if ($_POST['enviar'])//verifica se foi enviado o batao, porque todos os elementos do formulário sao enviados, inclusive o botao... sendo assim, ele identifica que foi executada a função de enviar
{
include ('../sql/connect_db');

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$acesso = $_POST['acesso'];

$sql = "SELECT nome_usuarios FROM usuarios WHERE user_name='$nome'";//faz uma consulta no banco de dados onde o campo nome_usuarios é igual a variável $nome, pra ver se o usuario ja esta cadastrado
$busca = mysql_query($sql);

$existe = mysql_num_rows($busca);//retorna o numero de linhas onde o nome_usuarios é igual a $nome

if ($existe > 0)//se $exite, ou seja, o numero de linhas de iguadades for maior que 0, ele aparece um erro e nao executa o resto do script, cadastrando assim o usuario que ja está cadastrado
{
?> <!-- Fecha o php soh para iniciar uma linha de java script, depoie recomeça o PHP novamente -->
<script language="javascript">alert("Usuário já Cadastrado");</script>
<? // Abrindo novamente o PHP
}
else
{//se o numero de linhas for 0, ele executa o resto do script, porque quer dizer que o usuário não está cadastrado

$sql = "INSERT INTO usuarios(user_name, user_pass, user_acess_level) VALUES ('$nome', '$senha', '$acesso')";

$grava = mysql_query($sql);

if ($grava)
{
?>
<script language="javascript">alert("Cadastro Efetuado com Sucesso!");</script>
<? 
}
else
{
echo "Erro: ".mysql_error();
}}}
?> 
<form id="form1" name="form1" method="post" onSubmit="return enviardados();" action="">
  <table width="400" border="0" align="center" cellspacing="2">
    <tr>
      <td colspan="2" align="center"><span class="style1">Cadastro de Usu&aacute;rio </span></td>
    </tr>
    <tr>
      <td colspan="2" align="right" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="114" align="right" valign="top">Usu&aacute;rio:</td>
      <td width="175" align="left"><label>
        <input name="nome" type="text" id="nome" size="20" maxlength="20" />
      </label></td>
    </tr>
    <tr>
      <td align="right" valign="top">Senha:</td>
      <td align="left"><label>
        <input name="senha" type="password" id="senha" size="6" maxlength="6" />
        <span class="style4">*m&aacute;ximo 6 caracteres</span> </label></td>
    </tr>
    <tr>
      <td align="right" valign="top">Confirmar Senha: </td>
      <td align="left"><label>
        <input name="confirma" type="password" id="confirma" size="6" maxlength="6" />
      </label></td>
    </tr>
    <tr>
      <td align="right" valign="top">Nivel de Acesso: </td>
      <td align="left"><label>
        <input name="acesso" type="radio" value="1" checked="checked" />
      </label>
        <label>
        Usu&aacute;rio<br />
        <input name="acesso" type="radio" value="2" />
      Administrador</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
      <input name="enviar" type="submit" id="enviar" value="Cadastrar" />
      <input name="Limpar" type="reset" id="Limpar" value="Limpar" />
      </label></td>
    </tr>
  </table>
</form>
