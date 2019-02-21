<?php

require 'config.php';
require 'include/page/security.php';

use Repository\ConsultaRepository;

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['paciente_id']) && isset($_GET['medico_id'])) {
    $result = ConsultaRepository::delete($_GET['paciente_id'], $_GET['medico_id']);
    if($result) {
      $_SESSION['sucesso'] = "Consulta removida com sucesso!";
    } else {
      $_SESSION['erro'] = "Ocorreu um erro ao remover a consulta!";
    }
    unset($result);
    header('location: /dashboard/consulta/listar');
}


 ?>
