<!DOCTYPE html>
<html lang="pt">

<?php

  require_once "animais/banco.php";

  // Pesquisar
  $banco = new banco;
  // Realiza a pesquisa somente quando receber os dados que deve pesquisar
  if($_POST["animal"]){
    $pesquisa = $_POST["animal"];
    $sql = "SELECT * FROM "
  }

  //$row = $banco->select($sql);
  $cont = 0;

?>

<head>
  <meta charset="UTF-8">
  <title>Para Surdo Ouvir</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cover.css">
  <link rel="stylesheet" href="css/starter-template.css">
</head>

<body>

  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column" style="width: 100%; max-width:1080px;">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">Para Surdo Ouvir</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="index.html">Home</a>
          <a class="nav-link active" href="animais.php">Animais</a>
          <a class="nav-link" href="#">Comidas</a>
          <a class="nav-link" href="#">Gestos</a>
          <a class="nav-link" href="palavra.php">Dicionário</a>
          <form class="form-inline ml-3" method="post">
              <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>
        </nav>

      </div>
    </header>

    <main role="main" class="container">

      <?php // Fazer enviar via POST qual o nome da palavra que será exibida na página palavra.php
//
  //    if(is_array($row)) {
    //    while ($count < count($row)) {
//
  //      }
    //  }

      ?>

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </main><!-- /.container -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
