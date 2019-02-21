<?php
require 'config.php';
require 'include/page/security.php';

use Repository\PlanoRepository;
$planos = PlanoRepository::findAll();

require 'include/page/head.php';
?>

<div class="col-md-8 offset-md-2 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Planos</h2>
    <hr>
  </div>
  <?
  require 'include/page/sucesso.php';
  require 'include/page/erro.php';
  ?>
  <div class="row">
    <?
    foreach ($planos as $plano) {
    ?>
    <div class="card" style="width: 14rem;">
      <div class="text-center">
        <img width="80%" src="/assets/img/plan.png" style="margin-top:10px" alt="Card image cap">
      </div>
      <div class="card-body text-center">
        <h5 class="card-title"><? echo $plano['nome']; ?></h5>
        <p><strong>Valor: </strong> R$ <? echo $plano['valor']; ?></p>
        <a href="/dashboard/plano/remover?id=<? echo $plano['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
      </div>
    </div>
    <? } ?>
  </div>
</div>

<?php
require 'include/page/footer.php';
?>
