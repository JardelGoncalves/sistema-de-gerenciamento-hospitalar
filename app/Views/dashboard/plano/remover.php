<?php

require 'config.php';
require 'include/page/security.php';

use Repository\PlanoRepository;

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $result = PlanoRepository::delete($_GET['id']);
    if($result) {
      $_SESSION['sucesso'] = "Plano removido com sucesso!";
    } else {
      $_SESSION['erro'] = "Ocorreu um erro ao remover o plano. Verifique se algum paciente possui este plano antes de tentá-lo remover!";
    }
    unset($result);
    header('location: /dashboard/plano/listar');
}


 ?>
