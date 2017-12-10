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
	if(document.form1.descricao.value == ""){
	alert("Favor Preencher a Descrição");
	document.form1.descricao.focus();
	return false;
	}
	if(document.form1.depto.value == ""){
	alert("Favor Preencher o Departamento");
	document.form1.depto.focus();
	return false;
	}
	if(document.form1.qtd.value == ""){
	alert("Favor Preencher a Quantidade");
	document.form1.qtd.focus();
	return false;
	}
	if(document.form1.valor.value == ""){
	alert("Favor Preencher o Valor");
	document.form1.valor.focus();
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
	$descricao = $_POST['descricao'];
	$depto = $_POST['depto'];
	$qtd = $_POST['qtd'];
	$valor = $_POST['valor'];
	
	$sql = "SELECT nome_produto FROM produto WHERE nome_produto='$nome'";
	$busca = mysql_query($sql);
	$linha = mysql_num_rows($busca);
	
	if ($linha > 0)
	{?>
		<script language="javascript">alert("Produto Já Cadastrado");</script>
		<?
	}else{
		$sql = "INSERT produto(nome_produto, descricao_produto, depto_produto, valor, quantidade_produto) VALUES ('$nome', '$descricao', '$depto', '$valor', '$qtd')";
		$inserir = mysql_query($sql);
		if($inserir)
		{?>
			<script language="javascript">alert("Produto Cadastrado com Sucesso");</script>
		<? }else{echo "Erro: ".mysql_error();}
	}
}
?>

<form id="form1" name="form1" onSubmit="return enviardados();" method="post" action="">
  <table width="268" border="0" align="center">
    <tr>
      <td colspan="2" align="center"><span class="style1">Cadastro de Produtos </span></td>
    </tr>
    <tr>
      <td width="90">&nbsp;</td>
      <td width="168">&nbsp;</td>
    </tr>
    <tr>
      <td>Nome:</td>
      <td><label>
        <input name="nome" type="text" id="nome" size="26" maxlength="35" />
      </label></td>
    </tr>
    <tr>
      <td>Descri&ccedil;&atilde;o:</td>
      <td><label>
        <textarea name="descricao" id="descricao"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Departamento:</td>
      <td><label>
        <select name="depto" id="depto">
          <?
		  include ('../sql/connect_db');
		  $sql = "SELECT id_depto, descricao_depto FROM depto";
		  $busca = mysql_query($sql);
		  while($lista = mysql_fetch_array($busca)){?>
		  <option value="<?= $lista['id_depto'];?>"><?= $lista['descricao_depto'];?></option>
       <? }?>
	    </select>
      </label></td>
    </tr>
    <tr>
      <td>Quantidade:</td>
      <td><label>
        <input name="qtd" type="text" id="qtd" size="10" />
      </label></td>
    </tr>
    <tr>
      <td>Valor:</td>
      <td><label>
        <input name="valor" type="text" id="valor" />
      </label></td>
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
</form>

