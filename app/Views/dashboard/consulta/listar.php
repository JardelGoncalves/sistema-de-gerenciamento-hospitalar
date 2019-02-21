<?php
require 'config.php';
require 'include/page/security.php';
require 'include/page/head.php';

use Repository\ConsultaRepository;
use Repository\MedicoRepository;
use Repository\PacienteRepository;

$pacientes = PacienteRepository::findAll();
$consultas = ConsultaRepository::findAll();

?>

<div class="col-md-10 0ffset-1 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Consultas</h2>
    <hr>
  </div>
  <?
  require 'include/page/sucesso.php';
  ?>
  <div class="row">
  <?
    foreach($consultas as $consulta) {
      foreach ($pacientes as $paciente) {
        if ($consulta['paciente_id'] === $paciente['id']){
  ?>
      <div class="card" style="width: 14rem;">
        <div class="text-center">
          <img width="80%" src="/assets/img/calendar.png" style="margin-top:10px" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title"><?echo $paciente['nome'];?></h5>
          <p><? echo date('d/m/Y H:i:s', strtotime($consulta['data_marcada']));?></p>
          <a href="/dashboard/consulta" class="btn btn-danger">Desmarcar consulta</a>
        </div>
      </div>
  <?
  }}};
  ?>
</div>
</div>

<?php
require 'include/page/footer.php';
?>
