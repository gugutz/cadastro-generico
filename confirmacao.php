<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Confirma&ccedil;&atilde;o de Cadastro</title>
</head>

<body>
<?
include ('sql/connect_db');

$id = $_GET['id'];
$email = $_GET['email'];

$sql = "SELECT id, nome, email FROM clientes WHERE email = '$email'";
$busca = mysql_query($sql);
if ($busca){

$sql = "UPDATE clientes SET cl_status = '1' WHERE id='md5($id)'";
$alterar = mysql_query($sql);

echo "Confirmação Efetuada com Sucesso. Seu Cadastro está Ativo.";
}
else{echo "Erro: ".mysql_error();}
?>
</body>
</html>
