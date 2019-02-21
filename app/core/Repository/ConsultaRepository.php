<?php

namespace Repository;

use PDO;
use Repository\BaseRepository;
use Database\Connection;

final class ConsultaRepository implements BaseRepository
{

  /**
  * {@inheritdoc}
  * Salva uma consulta na tabela consultas e retorna o resultado da execução.
  */
  public static function save(array $data) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'INSERT INTO consultas (paciente_id, medico_id, data_marcada)
       VALUES (:PACIENTE, :MEDICO, :DATA)', array(
      ':PACIENTE' => $data['paciente_id'],
      ':MEDICO' => $data['medico_id'],
      ':DATA' => $data['data_marcada']
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

  /**
  * {@inheritdoc}
  * Retorna todas as consultas do banco de dados.
  */
  public static function findAll() : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery('SELECT * FROM consultas');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * {@inheritdoc}
  * Retorna uma consulta caso exista no banco de dados, senão retorna
  * um array vazio.
  */
  public static function findById(int $id, int $id_s = null) : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'SELECT * FROM consultas WHERE paciente_id = :ID AND medico_id = :ID_S', array(
        ':ID' => $id,
        ':ID_S' => $id_s
    ));
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return isset($result[0]) ? $result[0] : array();
  }

  /**
  * {@inheritdoc}
  * Atualiza a consulta com as informações contidas no array, vale ressaltar
  * que é preciso conter os IDs da consulta no array informado.
  * O status da operação é retornado.
  */
  public static function update(array $data) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'UPDATE consultas SET data_marcada = :DATA WHERE
       paciente_id = :ID AND medico_id = :ID_S', array(
         ':ID' => $data['paciente_id'],
         ':ID_S' => $data['medico_id'],
         ':DATA' => $data['data_marcada']
    ));

    if ($result->rowCount() == 0) {
      return false;
    }

    return true;
  }

  /**
  * {@inheritdoc}
  * Remove uma consulta caso exista no banco de dados. O status da operação
  * é retornado.
  */
  public static function delete(int $id, int $id_s = null) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'DELETE FROM consultas WHERE paciente_id = :ID AND medico_id = :ID_S', array(
        ':ID' => $id,
        ':ID_S' => $id_s
    ));
    if ($result->rowCount() == 0) {
      return false;
    }

    return true;
  }

  /**
  * Retorna todas as consultas de um determinado paciente
  * @param  int   $id Identificador do paciente
  *
  * @return array
  */
  public static function findByPaciente(int $id)
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'SELECT * FROM consultas WHERE paciente_id = :ID', array(
        ':ID' => $id
    ));
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Retorna todas as consultas de um determinado médico
  * @param  int   $id Identificador do médico
  *
  * @return array
  */
  public static function findByMedico(int $id)
  {
    $conn = new Connection();
    $result = $conn->executeQuery(
      'SELECT * FROM consultas WHERE medico_id = :ID', array(
        ':ID' => $id
    ));
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}

 ?>
