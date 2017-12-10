<h2>Administraçâo</h2>
<a href="index.php?go=dash" class="menulink">Painel Admin</a>
<a href="index.php?cadastro=cidade" class="menulink">Cidades</a>
<a href="index.php?cadastro=cliente" class="menulink">Clientes</a>
<a href="index.php?cadastro=empresa" class="menulink">Empresas</a>
<a href="index.php?cadastro=dpto" class="menulink">Departamento</a>
<a href="index.php?cadastro=pgto" class="menulink">Pagamentos</a>
<a href="index.php?cadastro=produtos" class="menulink">Produtor</a>
<a href="index.php?cadastro=usuarios" class="menulink">Usuarios</a>


<?php
/* ...e inclui o botão de deslogar */
echo "<form id='logout_button' name='logout_button' method='post' action='$logoutlink'>
	<label>
	<input name='logout' type='submit' id='logout' value='$txt_logoutbtn' /> 
	</label>";
?>
