<?php
use Repository\PlanoRepository;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = array(
    'nome'     => $_POST['nome'],
    'valor'      => $_POST['valor']
  );

  $result = PlanoRepository::save($data);
  if($result):
    $_SESSION['sucesso'] = 'Plano cadastrado com sucesso!';
    header('location: /dashboard/plano/listar');
    die();
  else:
      $_SESSION['erro'] = 'Ocorreu um erro ao cadastrar o plano, verifique as informações e tente novamente!';
  endif;
}

?>
