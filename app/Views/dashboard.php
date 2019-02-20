<?php
require 'config.php';
require 'include/page/security.php';

use Repository\PacienteRepository;
use Repository\MedicoRepository;
use Repository\ConsultaRepository;
use Repository\PlanoRepository;

// quantidade de registro em cada tabela
$count_paciente = count(PacienteRepository::findAll());
$count_medico = count(MedicoRepository::findAll());
$count_consulta = count(ConsultaRepository::findAll());
$count_plano = count(PlanoRepository::findAll());

require 'include/page/head.php';
?>

<div class="col-md-8 offset-md-2  col-sm-12" style="margin-top:10%">
  <div class="row">
    <div class="col-md-3 col-sm-12" style="margin-top:10px">
      <div class="card" style="background:#d14846">
        <div class="card-body text-center">
          <span style="font-size: 50px; color: white;">
            <i class="fas fa-user-injured"></i>
          </span>
          <h2 style="margin-top:-10px; color:white">
            <? echo $count_paciente; ?>
          </h2>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-12" style="margin-top:10px">
      <div class="card" style="background:#3d97eb">
        <div class="card-body text-center">
          <span style="font-size: 50px; color: white;">
            <i class="fas fa-user-md"></i>
          </span>
          <h2 style="margin-top:-10px; color:white">
            <? echo $count_medico; ?>
          </h2>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-12" style="margin-top:10px">
      <div class="card" style="background:#d5df38">
        <div class="card-body text-center">
          <span style="font-size: 50px; color: white;">
            <i class="fas fa-calendar-check"></i>
          </span>
          <h2 style="margin-top:-10px; color:white">
            <? echo $count_consulta; ?>
          </h2>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-12" style="margin-top:10px">
      <div class="card" style="background:#66d157">
        <div class="card-body text-center">
          <span style="font-size: 50px; color: white;">
            <i class="fas fa-file-invoice-dollar"></i>
          </span>
          <h2 style="margin-top:-10px; color:white">
            <? echo $count_plano; ?>
          </h2>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require 'include/page/footer.php'
?>
