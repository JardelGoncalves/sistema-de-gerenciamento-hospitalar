<?php

use Repository\PacienteRepository;
$pacientes = [];
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nome'])):
  $pacientes = PacienteRepository::findByName($_GET['nome']);
endif;
