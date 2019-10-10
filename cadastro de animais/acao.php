<?php 
    require_once 'banco.php';
    require_once 'bancoNN.php';
	$acao = isset($_POST['acao'])?$_POST['acao']:$_GET['acao'];

	if($acao == "excluir"){
		$tabela = isset($_GET['tabela'])?$_GET['tabela']:'';
		$id = isset($_GET['codigo'])?$_GET['codigo']:0;

		$banco = new banco;
		$banco->setTabela($tabela);
		$banco->delete($id);
		header("location:index.php");
	}
	
	elseif ($acao=='inserirTA') {
        $id = 0;
        if(isset($_POST['id']))
        $id = $_POST['id'];

        $tipo = "";
        if(isset($_POST['tipo']))
        $tipo = $_POST['tipo'];

        

        $banco = new banco;
        $banco->setTabela("tipoAnimal");
        
        
        if($id != 0){
            $vetor = [$id, $tipo];
            $banco->update($vetor);
            var_dump($vetor);
            header("location:cad_tipoAnimal.php?id=$id");
        }
        else{
            $vetor = [null, $tipo];
            $banco->inserir($vetor);
            header("location:index.php");
        }
        
    }

    elseif($acao == "inserirA"){
        $id = 0;
        if(isset($_POST['id']))
        $id = $_POST['id'];

        $nome = "";
        if(isset($_POST['nome']))
        $nome = $_POST['nome'];

    $linkImg = "";
        if(isset($_POST['linkImg']))
        $linkImg = $_POST['linkImg'];

    $linkVid = "";
        if(isset($_POST['linkVid']))
        $linkVid = $_POST['linkVid'];

    $tipoCodigo = "";
        if(isset($_POST['tipoCodigo']))
        $tipoCodigo = $_POST['tipoCodigo'];

        $banco = new banco;
		$banco->setTabela('animais');
        if($id != 0){
            $vetor = [$id, $nome, $linkImg, $linkVid, $tipoCodigo];
            $banco->update($vetor);
            header("location:cad_animais.php?id=$id");
           }
           else{
            $vetor = [null, $nome, $linkImg, $linkVid, $tipoCodigo];
            $banco->inserir($vetor);
            header("location:index.php");

           }
    }
   

    elseif ($acao == "inserirTAA"){
        $tipoAnimais = isset($_POST['tipoAnimais'])?$_POST['tipoAnimais']:0;
        $animais = isset($_POST['animais'])?$_POST['animais']:0;

    
        $vetor = [$tipoAnimais, $animais];
    
        $bancoN = new bancoNN;
        $bancoN->setTabela("tipoAnimais_has_animais");
        if($_POST['alterar'] == 1){
            $bancoN->update($vetor);
            header("location:cad_tipoAnimaisAnimais.php?id=$tipoAnimais&id2=$animais");
        }
        else{
            $bancoN->inserirN($vetor);
            header("location:index.php");
        }
    }
    
    elseif($acao == "excluirN"){
        $tabela = isset($_GET['tabela'])?$_GET['tabela']:"";
        $codigo = isset($_GET['codigo'])?$_GET['codigo']:0;
        $codigo2 = isset($_GET['codigo2'])?$_GET['codigo2']:0;
        $bancoN = new bancoNN;
        $bancoN->setTabela($tabela);
        $bancoN->deleteN($codigo, $codigo2);
        header("location:index.php");
    }
?>