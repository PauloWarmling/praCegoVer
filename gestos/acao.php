<?php 
    require_once 'banco.php';
	$acao = isset($_POST['acao'])?$_POST['acao']:$_GET['acao'];

	if($acao == "excluir"){
		$tabela = isset($_GET['tabela'])?$_GET['tabela']:'';
		$id = isset($_GET['codigo'])?$_GET['codigo']:0;

		$banco = new banco;
		$banco->setTabela($tabela);
		$banco->delete($id);
		header("location:index.php");
	}
	
	elseif ($acao=='inserirTG') {
        $id = 0;
        if(isset($_POST['id']))
        $id = $_POST['id'];

        $tipo = "";
        if(isset($_POST['tipo']))
        $tipo = $_POST['tipo'];

        

        $banco = new banco;
        $banco->setTabela("tipoGestos");
        
        
        if($id != 0){
            $vetor = [$id, $tipo];
            $banco->update($vetor);
            var_dump($vetor);
            header("location:cad_tipoGestos.php?id=$id");
        }
        else{
            $vetor = [null, $tipo];
            $banco->inserir($vetor);
            header("location:index.php");
        }
        
    }

    elseif($acao == "inserirG"){
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
		$banco->setTabela('gestos');
        if($id != 0){
            $vetor = [$id, $nome, $linkImg, $linkVid, $tipoCodigo];
            $banco->update($vetor);
            header("location:cad_gestos.php?id=$id");
           }
           else{
            $vetor = [null, $nome, $linkImg, $linkVid, $tipoCodigo];
            $banco->inserir($vetor);
            header("location:index.php");

           }
    }
   
?>