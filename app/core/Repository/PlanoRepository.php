<?php

namespace Repository;

use PDO;
use Repository\BaseRepository;
use Database\Connection;

final class PlanoRepository implements BaseRepository
{

  /**
  * {@inheritdoc}
  * Salva um plano na tabela planos e retorna o resultado da execução.
  */
  public static function save(array $data) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery('INSERT INTO planos (nome, valor) VALUES (:NOME, :VALOR)', array(
      ':NOME' => $data['nome'],
      ':VALOR' => $data['valor']
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

  /**
  * {@inheritdoc}
  * Retorna todos os planos do banco de dados.
  */
  public static function findAll() : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery('SELECT * FROM planos');

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * {@inheritdoc}
  * Retorna um plano caso exista no banco de dados, senão retorna
  * um array vazio.
  */
  public static function findById(int $id, int $id_s = null) : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery('SELECT * FROM planos WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return isset($result[0]) ? $result[0] : array();
  }

  /**
  * {@inheritdoc}
  * Atualiza o plano com as informações contidas no array, vale ressaltar
  * que é preciso conter o ID do plano no array informado.
  * O status da operação é retornado.
  */
  public static function update(array $data) : bool
  {
    if (!$data['id']) {
      return false;
    }

    $conn = new Connection();
    $result = $conn->executeQuery('UPDATE planos SET nome = :NOME, valor = :VALOR WHERE id = :ID',
      array(
        ':ID' => $data['id'],
        ':NOME' => $data['nome'],
        ':VALOR' => $data['valor']
    ));

    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

  /**
  * {@inheritdoc}
  * Remove um plano caso exista no banco de dados. O status da operação
  * é retornado.
  */
  public static function delete(int $id, int $id_s = null) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery('DELETE FROM planos WHERE id = :ID', array(
        ':ID' => $id
    ));

    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

}

 ?>
