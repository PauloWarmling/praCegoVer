<!DOCTYPE html>
<html>
<?php
require_once 'banco.php';
$tb_tipoGestos = "tipoGestos";
$id = isset($_GET['id'])?$_GET['id']:0;
$id2 = isset($_GET['id2'])?$_GET['id2']:0;
$banco = new banco;
$valores = $banco->select("SELECT * FROM $tb_tipoGestos tg where tg.codigo = $id");
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
tipo<input type="text" name="tipo" <?php if(isset($valores[0][1])){echo "value='{$valores[0][1]}'}";} ?>><br>
<input type="submit" name="acao" value="inserirTG">
</form>
</body>
</html>