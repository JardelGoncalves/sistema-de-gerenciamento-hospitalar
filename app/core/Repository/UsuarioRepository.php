<?php

namespace Repository;

use PDO;
use Repository\BaseRepository;
use Database\Connection;

class UsuarioRepository implements BaseRepository
{

  /**
  * {@inheritdoc}
  * Salva um usuário na tabela usuários e retorna o resultado da execução.
  */
  public static function save(array $data) : bool
  {
    $conn = new Connection();

    $result = $conn->executeQuery(
      'INSERT INTO usuarios (nome, email, senha) VALUES (:NOME, :EMAIL, :SENHA)', array(
        ':NOME' => $data['nome'],
        ':EMAIL' => $data['email'],
        ':SENHA' => md5($data['senha'])
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

  /**
  * {@inheritdoc}
  * Retorna todos os usuários do banco de dados.
  */
  public static function findAll() : array
  {
    $conn = new Connection();

    $result = $conn->executeQuery(
      'SELECT id, nome, email FROM usuarios'
    );

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * {@inheritdoc}
  * Retorna o usuário caso exista no banco de dados, senão retorna
  * um array vazio.
  */
  public static function findById(int $id, $id_s = null) : array
  {
    $conn = new Connection();

    $result = $conn->executeQuery(
      'SELECT id, nome, email FROM usuarios WHERE id = :ID LIMIT 1', array(
        ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * {@inheritdoc}
  * Atualiza o usuário com as informações contidas array, vale ressaltar
  * que é preciso conter o ID do usuário no array informado.
  * O status da operação é retornado.
  */
  public static function update(array $data) : bool
  {
    $conn = new Connection();
    if (!$data['id']) {
      return false;
    }

    $result = $conn->executeQuery(
      'UPDATE usuarios SET nome = :NOME, email = :EMAIL, senha = :SENHA WHERE id = :ID', array(
        ':ID' => $data['id'],
        ':NOME' => $data['nome'],
        ':EMAIL' => $data['email'],
        ':SENHA' => md5($data['senha'])
    ));
    if ($result->rowCount() == 0 ) {
      return false;
    }

    return true;

  }

  /**
  * {@inheritdoc}
  * Remove o usuário caso exista no banco de dados. O status da operação
  * é retornado.
  */
  public static function delete(int $id) : bool
  {
    $conn = new Connection();

    $result = $conn->executeQuery(
      'DELETE FROM usuarios WHERE id = :ID', array(
        ':ID' => $id
    ));

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

  /**
  * Retorna um usuário do banco de dados de acordo com o
  * email e senha informado.
  * @param  string  $email  Email do usuário cadastrado no banco de dados.
  * @param  string  $senha  Senha do usuário cadastrado no banco de dados.
  *
  * @return array
  */
  public static function findByEmailAndPassword(string $email, string $senha) : array
  {
    $conn = new Connection();

    $result = $conn->executeQuery(
      'SELECT * FROM usuarios WHERE email = :EMAIL AND senha = :SENHA LIMIT 1', array(
        ':EMAIL' => $email,
        ':SENHA' => md5($senha)
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
 ?>
