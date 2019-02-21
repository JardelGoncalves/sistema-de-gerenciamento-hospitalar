<?php
use Repository\ConsultaRepository;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = array(
    'paciente_id'   => $_POST['paciente_id'],
    'medico_id'     => $_POST['medico_id'],
    'data_marcada'  => date('d-m-Y H:i:s',strtotime($_POST['data_marcada']))
  );

  $result = ConsultaRepository::save($data);
  if($result):
    $_SESSION['sucesso'] = 'Consulta cadastrada com sucesso!';
    header('location: /dashboard/consulta/listar');
    die();
  else:
      $_SESSION['erro'] = 'Ocorreu um erro ao tentar marcar a consulta, verifique as informações e tente novamente!';
  endif;
}

?>
