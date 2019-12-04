<?php


class bancoComandos extends Banco{

    private $pdo, $tabela;

    /*  Retirar comentário e deixar como estava caso dê erro
    public function conexao() {
        try {
            require_once "conf.php";
            $this->pdo = new PDO('mysql:host='.$host.';dbname='.$database, $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    */

    public function obterCampos() {
        $consulta = $this->pdo->query("desc " . $this->tabela);

        while ($lista = $consulta->fetch()) {
            $campos [] = $lista[0];
        }
        return $campos;
    }

    public function validarData($campo) {
        $data = DateTime::createfromFormat('d/m/Y', $campo);
        if ($data && $data->format('d/m/Y')) {
            return true;
        } else {
            return false;
        }
    }

    public function geraStmt($sql, $vetor, $campos){
        $stmt = $this->pdo->prepare($sql);
            for ($j = 1; $j <= count($vetor)-1; $j++) {
                if (is_numeric($vetor[$j])) {
                    $stmt->bindParam (':' . $campos[$j], $vetor[$j], PDO::PARAM_STR);
                    } elseif ($this->validarData($vetor[$j])) {
                    $stmt->bindParam(':' . $campos[$j], date("Y-m-d", strtotime(str_replace("/", "-", $vetor[$j]))), PDO::PARAM_STR);
                } else {
                    $stmt->bindParam(':' . $campos[$j], $vetor[$j], PDO::PARAM_STR);
                }
            }
            return $stmt;
    }

    public function select($sql) {
        $this->conexao();
        try {
            $consulta = $this->pdo->query($sql);
            $vetor = null;
            while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                $vetor[] = $linha;
            }
            return $vetor;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function selectExibicao($resultado, $tabela){
      $count = 0;
        while($count < count($resultado, $tabela)){
          $retornar[$count] = '
          <div class="col-md-4 flip-container">
            <div class="card shadow-sm flipper">
              <a href="palavra.php?'.$resultado[$count][1].'&'.$tabela.'">
                <div class="front">
                  <img class="card-img-top" src="'.$resultado[$count][2].'">
                  <div class="card-img-overlay">
                    <h4 class="card-title">'.$resultado[$count][1].'</h4>
                  </div>
                </div>
                <div class="back">
                  <img class="card-img-top" src="'.$resultado[$count][3].'">
                </div>
              </a>
            </div>
          </div>
          ';
          $count++;
        }
        return $retornar;
    }

    function getPdo() {
        return $this->pdo;
    }

    function getTabela() {
        return $this->tabela;
    }

    function setPdo($pdo) {
        $this->pdo = $pdo;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }


}
