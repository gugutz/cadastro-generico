<?php
include('sql/connect_db.php');

	
	if ( $_POST['login'] != NULL && $_POST['senha'] != NULL ) { // se os valores de $_POST nao forem nulos, o usuario ja digitou e enviou seu login. tenta autenticar
	
		$login=$_POST['login']; // retorna o valor de 'login' se estiver preenchido, senão, retorna o valor 'niguem'
		$senha=$_POST['senha'];
		
		// variable which defines the search parameters in the query to come.
		$sql="select * from usuarios where user_name='$login' and user_pass='$senha'";	
		
		// new way of doing query in php 7..
		// mysqli is object oriented, so the result ($busca) will become an object in mysqli. 
		$busca = $dbconnect->query($sql);
		
		$fetchresult = $busca->fetch_assoc(); // novo jeito usando mysqli orientado a objeto, referindo o objeto fetch_assoc dentro da extensao mysqli
	
		if ( $fetchresult>0 ) {
			
			include ($sessionstartlink);

			header("Refresh: 3; location:$dashboardlink");
			echo $msg_loginsuccess;
			} //endif
	
		else {
			//header("location:$loginlink");
			echo $msg_loginfail;
			}  //endelse
		} //endif
		
			
	if ( !isset($_SESSION) ) { // caso os valores da variavel global $_POST sejam nulos, o usuario ainda nao digitou seu login, apresentar formulario de login
	echo "
	<script language='javascript'>
		function checa() {
			if(document.acesso.login.value=='') {
				alert('Campo Login Obrigatório');
				document.acesso.login.focus();
			return false;
			} //endif
			if(document.acesso.senha.value=='') {
				alert('Campo Senha Obrigatório');
				document.acesso.senha.focus();
			return false;
			} //endif
		return true;
		}
	</script>

	<table align='center'>
		<form name='acesso' method='post' action='$loginlink' onSubmit='return checa()'>
			<tr>
				<td>Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type='text' name='login' id='login'  /></td>
			</tr>
			<tr>
				<td>Senha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type='password' name='senha' id='senha' /></td>
			</tr>
			<tr>
				<td><input type='submit' value='$txt_loginlink'   /></td>
				<td><input type='reset' value='Limpar'  /></td>
			</tr>
		</form>
	</table>
	"; //endecho
	} //endif


/*		ESSE EH O MALDITO ELSEIF QUE QUEBROU MEU LOGIN E DEMOREI 2 NOITES PRA ACHAR
		ARRUMAR ISSO
		
	elseif (isset($_SESSION)) {
		//pause ('3');
		header("location:$dashboardlink");
		echo $msg_alreadyloggedin;
		} //endif

//$closeconnection;
	
?>
