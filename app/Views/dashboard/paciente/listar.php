<?php
require 'config.php';
require 'include/page/security.php';

use Repository\PacienteRepository;
$pacientes = PacienteRepository::findAll();

require 'include/page/head.php';
?>

<div class="col-md-10 offset-md-1 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Pacientes</h2>
    <hr>
  </div>
  <?require 'include/page/sucesso.php';?>
  <?require 'include/page/erro.php';?>
  <div class="row">
    <?
    foreach ($pacientes as $paciente) {
    ?>
    <div class="card" style="width: 14rem;">
      <div class="text-center">
        <img width="80%" src="/assets/img/patient.png" style="margin-top:10px" alt="Card image cap">
      </div>
      <div class="card-body text-center">
        <h5 class="card-title"><? echo $paciente['nome']; ?></h5>
        <a href="/dashboard/paciente/editar?id=<? echo $paciente['id']; ?>" class="btn btn-warning">
          <i class="fas fa-edit"></i>
        </a>
        <a href="/dashboard/paciente/remover?id=<? echo $paciente['id']; ?>" class="btn btn-danger">
          <i class="fas fa-trash"></i>
        </a>
      </div>
    </div>
    <? } ?>

  </div>

</div>

<?php
require 'include/page/footer.php';
?>
