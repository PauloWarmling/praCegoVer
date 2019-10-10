<?php

class banco {

    private $pdo, $tabela;

    public function conexao() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=gestos', "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function obterCampos() {
        $consulta = $this->pdo->query("desc " . $this->tabela);

        while ($lista = $consulta->fetch()) {
            $campos [] = $lista[0];
        }
        return $campos;
    }

    function geraSelect($default, $selecao, $value, $descricao, $select, $filtro) {
		$sql = 'select * from ' .$this->tabela.' '. $filtro.' order by ' .$descricao;
		echo '<select name="'.$select.'" id="'.$select.'">';
		echo '<option value="default" class="disabled" disabled>'.$default.'</option>';
		$banco = new banco;
		$row = $banco->select($sql);
		$cont = 0;
		while ($cont < count($row)) {
			$birobiro = "";
			if ($row[$cont][$value] == $selecao) {
				$birobiro = ' selected ';
			}
			echo '<option value="'.$row[$cont][$value].'"' .$birobiro. '>' .$row[$cont][$descricao]. '</option>';
			$cont++;
		}
		echo '</select>';
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

    public function inserir($vetor) {
        $this->conexao();
        try {
            $campos = $this->obterCampos();
            $sql = "INSERT INTO " . $this->tabela . "(";
            $i = 0;
            foreach ($campos as $v) {
                if ($i == 1) {
                    $sql .= $v;
                } elseif ($i > 1) {
                    $sql .= ", " . $v;
                }
                $i++;
            }
            $sql .= ") VALUES(";
            $i = 0;
            foreach ($campos as $v) {
                if ($i == 1) {
                    $sql .= ":" . $v;
                } elseif ($i > 1) {
                    $sql .= ", :" . $v;
                }
                $i++;
            }
            $sql .= ")";
            #echo $sql;
            $stmt = $this->geraStmt($sql, $vetor, $campos);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete($id) {
        $this->conexao();
        try {
            $stmt = $this->pdo->prepare('DELETE FROM ' . $this->tabela . ' WHERE codigo = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function update($vetor) {
        $this->conexao();
        try {
            $sql = "UPDATE {$this->getTabela()} SET ";
            $campos = $this->obterCampos();
            $i = 0;
            foreach ($campos as $v) {
                if ($i == 1) {
                    $sql .= $v." = :" . $v;
                } elseif ($i > 1) {
                    $sql .= ", ".$v." = :" . $v;
                }
                $i++;
            }
            $sql .= " WHERE {$campos[0]} = :{$campos[0]}";
            echo $sql;
            $stmt = $this->geraStmt($sql, $vetor, $campos);
            $stmt->bindParam (':' . $campos[0], $vetor[0], PDO::PARAM_INT);
            $stmt->execute();
            echo $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
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
