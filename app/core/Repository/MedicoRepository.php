<?php

namespace Repository;

use PDO;
use Repository\BaseRepository;
use Database\Connection;

final class MedicoRepository implements BaseRepository
{

  /**
  * {@inheritdoc}
  * Salva um médico na tabela medicos e retorna o resultado da execução.
  */
  public static function save(array $data) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'INSERT INTO medicos (nome, especialidades, crm)
       VALUES (:NOME, :ESPECIALIDADES, :CRM)', array(
      ':NOME' => $data['nome'],
      ':ESPECIALIDADES' => $data['especialidades'],
      ':CRM' => $data['crm']
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

  /**
  * {@inheritdoc}
  * Retorna todos os médicos do banco de dados.
  */
  public static function findAll() : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery('SELECT * FROM medicos');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * {@inheritdoc}
  * Retorna um médico caso exista no banco de dados, senão retorna
  * um array vazio.
  */
  public static function findById(int $id, int $id_s = null) : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery('SELECT * FROM medicos WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return isset($result[0]) ? $result[0] : array();
  }

  /**
  * {@inheritdoc}
  * Atualiza o médico com as informações contidas no array, vale ressaltar
  * que é preciso conter o ID do médico no array informado.
  * O status da operação é retornado.
  */
  public static function update(array $data) : bool
  {
    if (!$data['id']) {
      return false;
    }

    $conn = new Connection();
    $result = $conn->executeQuery(
      'UPDATE medicos SET nome = :NOME, especialidades = :ESPECIALIDADES,
       crm = :CRM WHERE id = :ID', array(
        ':ID' => $data['id'],
        ':NOME' => $data['nome'],
        ':ESPECIALIDADES' => $data['especialidades'],
        ':CRM' => $data['crm']
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

  /**
  * {@inheritdoc}
  * Remove um médico caso exista no banco de dados. O status da operação
  * é retornado.
  */
  public static function delete(int $id, int $id_s = null) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'DELETE FROM medicos WHERE id = :ID', array(
        ':ID' => $id
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

}

 ?>
