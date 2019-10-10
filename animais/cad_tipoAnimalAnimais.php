<html>
<?php
	require_once "banco.php";
    $codigo = isset($_GET['id'])?$_GET['id']:0;
    $codigo2 = isset($_GET['id2'])?$_GET['id2']:0;
    $banco = new banco;
    if($codigo != 0 and $codigo2!= 0)


?>
<head>
	<meta charset="UTF-8"/>
</head>
<body>
	<a href="index.php">Listagem</a>
	<form action="acao.php" method="post">
		tipoAnimal<?php $banco->setTabela('tipoAnimal'); echo $banco->geraSelect("tipoAnimal", $codigo, 0, 1, "tipoAnimal", ''); ?><br>
		animais<?php $banco->setTabela('animais'); echo $banco->geraSelect("animais", $codigo2, 0, 1, 'animais', '');?><br>
        <input type="hidden" name="alterar" value="<?php echo $codigo != 0?1:0;?>">
		<button value="inserirCLC" name="acao" type="submit">Inserir</button>
	</form>
</body>
</html>