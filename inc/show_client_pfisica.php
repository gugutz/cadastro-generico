<?php
$includes='inc/';  //Includes path

include ($includes . 'sql/connect_db.php'); //arquivo p/ conexão
$sql="select * from clientes where cl_tipo='2' ORDER BY cl_nome";
$search=mysql_query($sql);
?>

<table class="show-clients-table">
<tr class="td-title">
<td>ID</td>
<td>NOME</td>
<td>CPF</td>
<td>Endereço</td>
<td>Bairro</td>
<td>CEP</td>
<td>Cidade</td>
<td>Fone 1</td>
<td>Celular</td>
<td>UF</td>
<td>Última Compra</td>
</tr>
<?php
// Criando o laço para exibir os dados
while($list=mysql_fetch_array($search))
	{
echo "<tr class='bg-darkgray'>";
echo "<td>$list[cl_id]</td>";
echo "<td><a href='cl_detail.php?id=$list[cl_id]'>$list[cl_nome]</a></td>";
echo "<td>$list[cl_cnpj]</td>";
echo "<td>$list[cl_end]</td>";
echo "<td>$list[cl_bairro]</td>";
echo "<td>$list[cl_cep]</td>";
echo "<td>$list[cl_cidade]</td>";
echo "<td>$list[cl_fone1]</td>";
echo "<td>$list[cl_fone2]</td>";
echo "<td>$list[cl_uf]</td>";
echo "<td>$list[cl_ie]</td>";
echo "</tr>";
	}
?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
