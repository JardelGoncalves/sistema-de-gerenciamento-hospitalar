<?php
namespace Database;

use PDO;

class Connection extends PDO
{
  private $conn;
  private $dbname = 'hms';
  private $user = 'jupiter';
  private $passwd = 'solarsystem';
  private $host = 'db';
  private $port = 5432;

  public function __construct()
  {
    $this->conn = new PDO("pgsql:dbname=$this->dbname;host=$this->host;port=$this->port;user=$this->user;password=$this->passwd");
  }
  /**
  * Percorre todos os parâmetros informado e fornece para mountQuery() os dados
  * @param PDOStatement   $stmt       Será preparada para executar
  * @param array         $parameters  Array contendo chave-valor
  */
  private function setParameters($stmt, $key, $value)
  {
    $stmt->bindParam($key, $value);

  }
  /**
  * Vincula os valores informado as chaves da query
  * @param PDOStatement   $stmt   Será preparada para executar
  * @param string         $key    Chave da instrução SQL
  * @param string         $value  Valor referente a chave
  */
  private function mountQuery($stmt, $parameters)
  {
    foreach($parameters as $key => $value) {
      $this->setParameters($stmt, $key, $value);
    }

  }

  /**
  * Recebe a query e os parametros, chama o método setParameters() e executa a instrução SQL
  * @param  string   $query       Query que irá executar uma ação no banco de dados
  * @param  array    $parameters  Array contendo chave-valor
  * @return PDOStatement $stmt    Retorna os dados e/ou informações da instrução executada
  */
  public function executeQuery(string $query, $parameters = array())
  {
    $stmt = $this->conn->prepare($query);
    $this->mountQuery($stmt, $parameters);
    $stmt->execute();
    return $stmt;
  }


}

 ?>
