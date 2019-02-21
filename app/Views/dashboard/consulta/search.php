<?php
require 'config.php';
require 'include/page/security.php';
require 'include/search_paciente.php';


require 'include/page/head.php';
?>
<div class="col-md-8 offset-md-2 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Pesquisar Paciente</h2>
    <hr>
  </div>
  <form method="get">
    <div class="form-group">
      <label for="inputNome">Nome</label>
      <input type="text" name="nome" class="form-control" placeholder="Nome do paciente" required>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Pesquisar</button>
  </form>

  <div style="margin-top:80px">
    <?
    foreach ($pacientes as $paciente) {
    ?>
    <div class="card" style="width: 14rem;">
      <div class="text-center">
        <img width="80%" src="/assets/img/patient.png" style="margin-top:10px" alt="Card image cap">
      </div>
      <div class="card-body">
        <h5 class="card-title"><? echo $paciente['nome']; ?></h5>
        <a href="/dashboard/consulta/marcar?id=<? echo $paciente['id']; ?>" class="btn btn-success">Marcar uma consulta</a>
      </div>
    </div>
    <? } ?>
  </div>
</div>


<?php
require 'include/page/footer.php';
?>
