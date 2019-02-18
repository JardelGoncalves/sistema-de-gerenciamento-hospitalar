<?php

namespace Repository;

interface BaseRepository
{
  /**
  * Salva um determinado dado no banco de dados.
  * @param   array   $data  Array chave-valor, seguindo o padrão :NOME para chave.
  *
  * @return  bool
  */
  public static function save( array $data ) : bool;

  /**
  * Retorna um array com outro(s) array(s) contendo os dados.
  *
  * @return   array
  */
  public static function findAll() : array;

  /**
  * Retorna um determinado dado cadastrado em uma tabela do banco de dados.
  * @param    int   $id   Identificador único para um recurso no banco de dados.
  * @param    int   $id_s Identifcador secundário (opcional) para tabelas com duas colunas como PK.
  *
  * @return   array
  */
  public static function findById(int $id, int $id_s = null) : array;

  /**
  * Atualiza um determinado recurso no banco de dados.
  * @param   array   $data  Array chave-valor, com o ID.
  *
  * @return  bool
  */
  public static function update(array $data) : bool;

  /**
  * Remove um determinado recurso do banco de dados.
  * @param   int   $id  Identificador do recurso.
  * @param   int   $id_s Identifcador secundário (opcional) para tabelas com duas colunas como PK.
  *
  * @return  bool
  */
  public static function delete(int $id, int $id_s = null) : bool;
}

 ?>
