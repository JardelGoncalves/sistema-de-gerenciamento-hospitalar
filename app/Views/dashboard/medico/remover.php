<?php

require 'config.php';
require 'include/page/security.php';

use Repository\MedicoRepository;

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $result = MedicoRepository::delete($_GET['id']);
    if($result) {
      $_SESSION['sucesso'] = "Médico removido com sucesso!";
    } else {
      $_SESSION['erro'] = "Ocorreu um erro ao remover o médico!";
    }
    unset($result);
    header('location: /dashboard/medico/listar');
}


 ?>
