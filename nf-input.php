<?php
$includes='inc/';  //Includes path
include($includes . 'sql/connect_db.php'); //arquivo p/ conexão
include($includes . 'php_variables.php'); //arquivo p/ conexão
$get_id=$_GET['id'];
$sql="select * from clientes where cl_id='$get_id'";
$search=mysql_query($sql);
?>

<table id="postnews">
<form name="postnews" method="post" action="index.php?go=savenews">
<tr>
<td>
<label for="cfop">Naturalidade:</label>
<select name="cfop" id="cfop">
<optgroup label="CFOP">
<option selected="selected"></option>
<option>SC</option>
<option>RS</option>
<option>SP</option>
<option>RJ</option>
<option>PR</option>
</optgroup>
</select> 
</td>
</tr>


<tr>
<td><label for="obs">Produto 1</label></td
<td><textarea rows="2" cols="100" name="obs" id="obs"></textarea></td>
</tr>

<tr>
<td><label for="obs">Produto 2</label></td
<td><textarea rows="2" cols="100" name="obs" id="obs"></textarea></td>
</tr>

<tr>
<td><label for="obs">Produto 3</label></td
<td><textarea rows="2" cols="100" name="obs" id="obs"></textarea></td>
</tr>

<tr>
<td><label for="obs">Produto 4</label></td
<td><textarea rows="2" cols="100" name="obs" id="obs"></textarea></td>
</tr>

<tr>
<td><label for="obs">Produto 1</label></td
<td><textarea rows="2" cols="100" name="obs" id="obs"></textarea></td>
</tr>

<tr>
<td><label for="obs">Produto 1</label></td
<td><textarea rows="2" cols="100" name="obs" id="obs"></textarea></td>
</tr>
<tr>
<td><label for="obs">Dados Adicionais</label></td
<td><textarea rows="12" cols="47" name="obs" id="obs"></textarea></td>
</tr>

<tr>
<td><label for="title">Author</label></td>
<td colspan="2"><input type="text" name="author" id="author" size="50" /></td>
</tr>
<tr>
<td colspan="2" style="margin:0 auto;">
<input type="reset" value="Limpar tudo" name="clear" /><br>
<input type="submit" value="Tirar Nota Fiscal" name="send" />
</form>
</table>
    
   
  
   
  
 
