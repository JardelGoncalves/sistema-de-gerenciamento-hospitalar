<?php
use Repository\MedicoRepository;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = array(
    'nome'           => $_POST['nome'],
    'crm'            => $_POST['crm'],
    'especialidades' => $_POST['especialidades']
  );

  $result = MedicoRepository::save($data);
  if($result):
    $_SESSION['sucesso'] = 'Médico cadastrado com sucesso!';
    header('location: /dashboard/medico/listar');
    die();
  else:
      $_SESSION['erro'] = 'Ocorreu um erro ao cadastrar o médico, verifique as informações e tente novamente!';
  endif;
}

?>
