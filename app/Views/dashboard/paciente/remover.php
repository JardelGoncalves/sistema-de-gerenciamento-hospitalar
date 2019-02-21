<?php

require 'config.php';
require 'include/page/security.php';

use Repository\PacienteRepository;

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $result = PacienteRepository::delete($_GET['id']);
    if($result) {
      $_SESSION['sucesso'] = "Paciente removido com sucesso!";
    } else {
      $_SESSION['erro'] = "Ocorreu um erro ao remover o paciente!";
    }
    unset($result);
    header('location: /dashboard/paciente/listar');
}


 ?>
