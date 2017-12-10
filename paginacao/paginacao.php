<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
//Conexão com o banco:  
mysql_connect("localhost","root","");  
mysql_select_db("base");

// Informações da query. No caso, "SELECT * FROM produtos WHERE EXIBIR=1"  
$campos_query = "*";  
$final_query  = "FROM produtos WHERE EXIBIR=1";

// Declaração da pagina inicial  
$pagina = $_GET["pagina"];  
if($pagina == "") {  
    $pagina = "1";  
} 

// Maximo de registros por pagina  
$maximo = 3;

// Calculando o registro inicial  
$inicio = $pagina - 1;  
$inicio = $maximo * $inicio;

// Conta os resultados no total da minha query  
$strCount = "SELECT COUNT(*) AS 'num_registros' $final_query";  
$query    = mysql_query($strCount);  
$row      = mysql_fetch_array($query);  
$total    = $row["num_registros"];  

if($total<=0) {  
    echo "<center>Nenhum registro encontrado.</center>";  
} else {  
    $strQuery = "SELECT $campos_query $final_query LIMIT $inicio,$maximo";  
    $query    = mysql_query($strQuery);

while($row = mysql_fetch_array($query)) {  
        echo "Produto: ".$row["PRODUTO"]."<BR>"; 
		  ?>
          Foto: <img src="fotos/<?=$row['foto']?>" /><BR />
<?php  
    }

// Calculando pagina anterior  
    $menos = $pagina - 1;  

// Calculando pagina posterior  
    $mais = $pagina + 1;

$pgs = ceil($total / $maximo);  
    if($pgs > 1 ) {  
        // Mostragem de pagina  
        if($menos > 0) {  
           echo "<a href=\"?pagina=$menos&\" class='texto_paginacao'>anterior</a> ";  
        }  
        // Listando as paginas  
        for($i=1;$i <= $pgs;$i++) {  
            if($i != $pagina) {  
               echo "  <a href=\"?pagina=".($i)."\" class='texto_paginacao'>$i</a>";  
            } else {  
                echo "  <strong lass='texto_paginacao_pgatual'>".$i."</strong>";  
            }  
        }  
        if($mais <= $pgs) {  
           echo "   <a href=\"?pagina=$mais\" class='texto_paginacao'>próxima</a>";  
        }  
    }  
}  
?>
<body>
</body>
</html>