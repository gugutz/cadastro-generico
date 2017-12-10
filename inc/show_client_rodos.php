<?php
$includes='inc/';  //Includes path
include ($includes . 'sql/connect_db.php'); //arquivo p/ conexão
$sql="select * from clientes WHERE cl_tipo='3' ORDER BY cl_nome";
$search=mysql_query($sql);
?>
<table class="show-clients-table">
<tr class="td-title">
<td>ID</td>
<td><a href="index.php?go=show-client-rodos&amp;orderby=nome">NOME</a></td>
<td><a href="index.php?go=show-client-rodos&amp;orderby=cnpj">CNPJ</a></td>
<td><a href="index.php?go=show-client-rodos&amp;orderby=endereco">Endereço</a></td>
<td><a href="index.php?go=show-client-rodos&amp;orderby=bairro">Bairro</a></td>
<td><a href="show_client_rodos.php?orderby=cep">CEP</a></td>
<td><a href="show_client_rodos.php?orderby=cidade">Cidade</a></td>
<td><a href="show_client_rodos.php?orderby=fone1">Fone 1</a></td>
<td><a href="show_client_rodos.php?orderby=fone2">Fone 2</a></td>
<td><a href="show_client_rodos.php?orderby=uf">UF</a></td>
<td><a href="show_client_rodos.php?orderby=ie">IE</a></td>
</tr>

<?php
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