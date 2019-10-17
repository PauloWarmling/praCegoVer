<!DOCTYPE html>
<html lang="pt">

<?php

  // Fazer um select genérico
  require_once "bd/banco.php"; // Usado para SELECT, INSERT, ETC...
  require_once "bd/tabelas.php";

  // Contador
  $count = 0;

  // Pesquisar
  $banco = new banco;
  // Realiza a pesquisa somente quando receber os dados que deve pesquisar
  if(isset($_POST["pesquisa"])){
    $pesquisa = $_POST["pesquisa"];
    $sql = "SELECT * FROM ".$tb_comidas." WHERE nome LIKE '%".$pesquisa."%'";
    $resultado = $banco->select($sql);
  }

?>

<head>
  <meta charset="UTF-8">
  <title>Para Surdo Ouvir</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cover.css">
  <link rel="stylesheet" href="css/album.css">
  <link rel="stylesheet" href="css/flip.css">

</head>

<body>

  <div class="cover-container p-3 mx-auto" style="width: 100%; max-width:1440px;">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">Para Surdo Ouvir</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="index.html">Home</a>
          <a class="nav-link" href="animais.php">Animais</a>
          <a class="nav-link active" href="comidas.php">Comidas</a>
          <a class="nav-link" href="gestos.php">Gestos</a>
          <a class="nav-link" href="dicionario.php">Dicionário</a>
          <a class="nav-link" href="soletrado.php">Soletrado</a>
          <form class="form-inline ml-3" method="post">
              <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id="pesquisa" name="pesquisa">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>
        </nav>

      </div>
    </header>

    <main role="main" class="container">
      <div class="album py-5">
        <div class="container">
          <div class="row">
            <!-- Este div inteiro -->
            <?php
              if(is_array($resultado)){
                while($count < count($resultado)){
                  echo '
                  <div class="col-md-4 flip-container">
                    <div class="card mb-4 shadow-sm flipper">
                        <div class="front">
                          <img class="card-img-top" src="'.$resultado[$count][2].'">
                          <div class="card-img-overlay">
                            <h4 class="card-title">'.$resultado[$count][1].'</h4>
                          </div>
                        </div>
                        <div class="back">
                          <img class="card-img-top" src="'.$resultado[$count][3].'">
                        </div>
                    </div>
                  </div>
                  ';
                  $count++;
                }
              }
            ?>
            <!-- Será exibido apartir do while em PHP -->
          </div>
        </div>
      </div>

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