<?php
// Verifica se existe a variável palavra

if (isset($_GET["palavra"])) {
    $pesquisa = $_GET["palavra"];

    require_once "bd/banco.php";

    // Conexao com o banco de dados
    //$server = "200.135.58.18";
    //$user = "dicionariomudo";
    //$senha = "Dicionariomudo%123";
    //$base = "dicionariomudo";
    //$conexao = new mysqli($server, $user, $senha,$base);

    $banco = new banco;

    // Verifica se a variável está vazia
    if (empty($pesquisa)) {
        $sql = "(SELECT * FROM animais ORDER BY nome ASC)union(SELECT * FROM comidas ORDER BY nome ASC)union(SELECT * FROM gestos ORDER BY nome ASC)";
    } else {
      $sql = "(SELECT * FROM animais WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome ASC)union(SELECT * FROM comidas WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome ASC)union(SELECT * FROM gestos WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome ASC)";
    }
    $resultado = $banco->select($sql);
    //sleep(1);
    // Verifica se a consulta retornou linhas
    if (count($resultado) > 0) {
      $row = '<div class="row">';
      $return = "$row";
      $x = 0;
      while ($x < count($resultado)){
        $return.= '
        <div class="col-md-4 flip-container">
          <div class="card shadow-sm flipper">
            <a href="palavra.php?'.$resultado[$x][1].'">
              <div class="front">
                <img class="card-img-top" src="'.$resultado[$x][2].'">
                <div class="card-img-overlay">
                  <h4 class="card-title">'.$resultado[$x][1].'</h4>
                </div>
              </div>
              <div class="back">
                <img class="card-img-top" src="'.$resultado[$x][3].'">
              </div>
            </a>
          </div>
        </div>
          ';
          $x++;
        }
        echo $return.= '<div>';
    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros :(";
    }
}
?>
