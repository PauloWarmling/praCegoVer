<?php
// Verifica se existe a variável palavra

if (isset($_GET["palavra"])) {
    $palavra = $_GET["palavra"];

    // Conexao com o banco de dados
    $server = "200.135.58.18";
    $user = "dicionariomudo";
    $senha = "Dicionariomudo%123";
    $base = "dicionariomudo";
    $conexao = new mysqli($server, $user, $senha,$base);

    // Verifica se a variável está vazia
    if (empty($palavra)) {
        $sql = "SELECT * FROM * ORDER BY nome ASC";
    } else {
        $sql = "(SELECT * FROM animais WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome ASC)union(SELECT * FROM comidas WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome ASC)union(SELECT * FROM gestos WHERE nome LIKE '%".$pesquisa."%' ORDER BY nome ASC)";
    }
    //sleep(1);
    $result = $conexao->query($sql);
    $cont = $conexao->affected_rows;
    // Verifica se a consulta retornou linhas
    if ($cont > 0) {
      $row = '<div class="row">';
      $return = "$row";
      while ($linha = $result->fetch_array(MYSQLI_ASSOC)){
        $return.= '
          <div class="col-md-4 flip-container">
            <div class="card shadow-sm flipper">
              <a href="palavra.php?' . utf8_encode($linha["nome"]) . '">
                <div class="front">
                  <img class="card-img-top" src="' . utf8_encode($linha["linkImg"]) . '">
                  <div class="card-img-overlay">
                    <h4 class="card-title">' . utf8_encode($linha["nome"]) . '</h4>
                  </div>
                </div>
                <div class="back">
                  <img class="card-img-top" src="' . utf8_encode($linha["linkVid"]) . '">
                </div>
              </a>
            </div>
          </div>
          ';
        }
        echo $return.= '<div>';
    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros :(";
    }
}
?>
