<!DOCTYPE html>
<html lang="pt">

<?php

  require_once "bd/banco.php"; // Usado para SELECT, INSERT, ETC...
  require_once "bd/tabelas.php";

  // Contador
  $count = 0;

  // Pesquisar
  $banco = new banco;
  // Realiza a pesquisa somente quando receber os dados que deve pesquisar
  if(isset($_POST["pesquisa"])){
    $pesquisa = $_POST["pesquisa"];
    $sql = "SELECT * FROM ".$tb_animal." WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome ASC";
    $resultado = $banco->select($sql);
  }

?>

<head>
  <meta charset="UTF-8">
  <title>Dicionário Mudo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cover.css">
  <link rel="stylesheet" href="css/album.css">
  <link rel="stylesheet" href="css/flip.css">

</head>

<body>

  <div class="cover-container p-3 mx-auto" style="width: 100%; max-width:1440px; margin-tom: 5em;">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">Dicionário Mudo</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="index.html">Home</a>
          <a class="nav-link" href="dicionario.html">Dicionário</a> <!-- Depois renomear dicionario-ajax.html para dicionario.html -->
          <a class="nav-link active" href="#">Soletrado</a>
          <input style="width:220px" class="form-control ml-3 mr-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id="pesquisa" name="pesquisa">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" onclick="getDados();">Pesquisar</button>
        </nav>

      </div>
    </header>

    <main role="main" class="container">
      <!-- Fazer um echo em php dentro de um loop que verifica a variável que sofreu explode e caso seja um " " (espaço) é apenas exibido com echo normal e caso seja uma letra exibirá ela dando um echo <image src='img/letra.jpg' -->

      <?php // Fazer enviar via POST qual o nome da palavra que será exibida na página palavra.php
//
  //    if(is_array($resultado)) {
    //    while ($count < count($resultado)) {
//
  //      }
    //  }

      ?>

    </main><!-- /.container -->

  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
