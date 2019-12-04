<?php

/* Arrumar páginas dependentes dessas varáveis
  $host = "200.135.58.18";
  $database = "dicionariomudo";
  $usuario = "dicionariomudo";
  $senha = "DicionarioMudo%123";
*/

class Banco{

    private $host = "200.135.58.18";
    private $db_name = "dicionariomudo";
    private $username = "dicionariomudo";
    private $password = "DicionarioMudo%123";
    public $conn;

    public function conexao(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Erro na conexão: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>
