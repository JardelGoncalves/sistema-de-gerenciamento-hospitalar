<?php

namespace Repository;

use PDO;
use Repository\BaseRepository;
use Database\Connection;

final class PacienteRepository implements BaseRepository
{

  /**
  * {@inheritdoc}
  * Salva um paciente na tabela pacientes e retorna o resultado da execução.
  */
  public static function save(array $data) : bool
  {

    $conn = new Connection();
    $result = $conn->executeQuery( 'INSERT INTO pacientes
      (nome, cpf, rua, bairro, cidade, estado, cep, telefone, plano_id)
      VALUES (:NOME, :CPF, :RUA, :BAIRRO, :CIDADE, :ESTADO, :CEP, :TELEFONE,
      :PLANO)', array(
        ':NOME' => $data['nome'],
        ':CPF' => $data['cpf'],
        ':RUA' => $data['rua'],
        ':BAIRRO' => $data['bairro'],
        ':CIDADE' => $data['cidade'],
        ':ESTADO' => $data['estado'],
        ':CEP' => $data['cep'],
        ':TELEFONE' => $data['telefone'],
        ':PLANO' => $data['plano_id']
    ));
    // verifica se alguma linha na tabela foi afetada (ou seja, o registrou o dado)
    if ($result->rowCount() == 0 ) {
      return false;
    }

    return true;
  }

  /**
  * {@inheritdoc}
  * Retorna todos os pacientes do banco de dados.
  */
  public static function findAll() : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery('SELECT * FROM pacientes');

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * {@inheritdoc}
  * Retorna um paciente caso exista no banco de dados, senão retorna
  * um array vazio.
  */
  public static function findById(int $id, int $id_s = null) : array
  {
    $conn = new Connection();
    $result = $conn->executeQuery('SELECT * FROM pacientes WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));

    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return isset($result[0]) ? $result[0] : array();
  }

  /**
  * {@inheritdoc}
  * Atualiza o paciente com as informações contidas no array, vale ressaltar
  * que é preciso conter o ID do paciente no array informado.
  * O status da operação é retornado.
  */
  public static function update(array $data) : bool
  {
    if (!$data['id']) {
      return false;
    }

    $conn = new Connection();
    $result = $conn->executeQuery( 'UPDATE pacientes
      SET nome = :NOME, cpf = :CPF, rua = :RUA, bairro = :BAIRRO,
      cidade = :CIDADE, estado = :ESTADO, cep = :CEP, telefone = :TELEFONE,
      plano_id = :PLANO WHERE id = :ID', array(
        ':ID' => $data['id'],
        ':NOME' => $data['nome'],
        ':CPF' => $data['cpf'],
        ':RUA' => $data['rua'],
        ':BAIRRO' => $data['bairro'],
        ':CIDADE' => $data['cidade'],
        ':ESTADO' => $data['estado'],
        ':CEP' => $data['cep'],
        ':TELEFONE' => $data['telefone'],
        ':PLANO' => $data['plano_id']
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }

    return true;
  }

  /**
  * {@inheritdoc}
  * Remove um paciente caso exista no banco de dados. O status da operação
  * é retornado.
  */
  public static function delete(int $id, int $id_s = null) : bool
  {
    $conn = new Connection();
    $result = $conn->executeQuery('DELETE FROM pacientes WHERE id = :ID', array(
      ':ID' => $id
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

}

?>
