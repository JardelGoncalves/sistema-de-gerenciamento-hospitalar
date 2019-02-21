<?php
use Repository\PacienteRepository;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = array(
    'id'      =>  $_POST['id'],
    'nome'     => $_POST['nome'],
    'cpf'      => $_POST['cpf'],
    'rua'      => $_POST['rua'],
    'bairro'   => $_POST['bairro'],
    'cidade'   => $_POST['cidade'],
    'estado'   => $_POST['estado'],
    'cep'      => $_POST['cep'],
    'telefone' => $_POST['telefone'],
    'plano_id' => $_POST['plano']
  );

  $result = PacienteRepository::update($data);
  if($result):
    $_SESSION['sucesso'] = 'Paciente atualziado com sucesso!';
  else:
      $_SESSION['erro'] = 'Ocorreu um erro ao salvar o paciente, verifique as informações e tente novamente!';
  endif;
  header('location: /dashboard/paciente/listar');
  die();
}

?>
