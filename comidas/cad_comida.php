<!DOCTYPE html>
<html>
<?php
require_once 'banco.php';
$id = isset($_GET['id'])?$_GET['id']:0;
$banco = new banco;
$valores = $banco->select("SELECT * FROM comida where codigo = $id");
?>
<head>
	<title></title>
</head>
<body>
	<a href="index.php">Listagem</a>
	<form action="acao.php" method="post">
<?php
	if(isset($valores[0][0])){
		echo "<input type='hidden' value='{$valores[0][0]}' name='id'>";
	}
?>		
nome<input type="text" name="nome" <?php if(isset($valores[0][1])){echo "value='{$valores[0][1]}'}";} ?>><br>
linkImg<input type="text" name="linkImg" <?php if(isset($valores[0][2])){echo "value='{$valores[0][2]}'}";} ?>><br>
linkVid<input type="text" name="linkVid" <?php if(isset($valores[0][3])){echo "value='{$valores[0][3]}'}";} ?>><br>
tipoCodigo<input type="text" name="tipoCodigo" <?php if(isset($valores[0][4])){echo "value='{$valores[0][4]}'}";} ?>><br>

<input type="submit" name="acao" value="inserirA">
</form>
</body>
</html>