<?php
require 'config.php';
require 'include/page/security.php';

use Repository\MedicoRepository;
use Repository\PacienteRepository;

$medicos = MedicoRepository::findAll();

require 'include/cadastrar_consulta.php';

if(!isset($_GET['id']) || !$_GET['id']) {
  $_SESSION['erro'] = 'Paciente não informado';
  header('location: /dashboard/consulta/listar');
  die();
}

$paciente = PacienteRepository::findById($_GET['id']);
if(!$paciente) {
  $_SESSION['erro'] = 'Paciente não encontrado ou inválido';
  header('location: /dashboard/consulta/listar');
  die();
}

require 'include/page/head.php';
?>
<div class="col-md-8 offset-md-2 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Marcar consulta</h2>
    <hr>
  </div>
  <? require 'include/page/erro.php'; ?>
  <form method="post">
    <div class="form-group">
      <label for="inputNome">Paciente</label>
      <input type="text" value="<? echo $paciente['nome']; ?>" class="form-control" readonly>
      <input type="hidden" value="<? echo $paciente['id']; ?>" name="paciente_id">
    </div>
    <div class="form-group">
      <label for="SelectPlano">Médico</label>
      <select class="form-control" name="medico_id">
        <? foreach($medicos as $medico){ ?>
        <option value="<? echo $medico['id']; ?>"><? echo $medico['nome']; ?></option>
        <? } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="inputNome">Data</label>
      <input type="text" name="data_marcada" class="form-control" placeholder="mês/dia/ano hora:minuto" required>
    </div>
    <button type="submit" class="btn btn-success">Marcar</button>
  </form>
</div>

<?php
require 'include/page/footer.php';
?>
