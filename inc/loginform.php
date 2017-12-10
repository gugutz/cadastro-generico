
<?php
//  se o usuario nao estiver logado, inclui o formulario pra login
	if(!isset($_SESSION['admin')) {
	echo '
	<script language="javascript">
		function checa() {
			if(document.acesso.login.value=="") {
				alert("Campo Login Obrigatório");
				document.acesso.login.focus();
			return false;
			} //endif
			if(document.acesso.senha.value=="") {
				alert("Campo Senha Obrigatório");
				document.acesso.senha.focus();
			return false;
			} //endif
		return true;
		}
	</script>

	<table align="center">
		<form name="acesso" method="post" action="inc/login-auth.php" onSubmit="return checa()">
			<tr>
				<td>Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="text" name="login" id="login"  /></td>
			</tr>
			<tr>
				<td>Senha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="password" name="senha" id="senha" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="Entrar como Administrador"   /></td>
				<td><input type="reset" value="Limpar"  /></td>
			</tr>
		</form>
	</table>
	'; //endecho
	} //endif
	else {
		print('<p>Voce já está logado!</p>');
		}

?>
