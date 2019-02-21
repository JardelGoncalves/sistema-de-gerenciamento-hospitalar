<?php
require 'config.php';
require 'include/page/security.php';
require 'include/cadastrar_plano.php';

require 'include/page/head.php';

?>

<div class="col-md-8 offset-md-2 col-sm-12" style="margin-top:80px">
  <?
    require 'include/page/erro.php';
  ?>
  <div style="margin-bottom:20px">
    <h2>Cadastrar Plano</h2>
    <hr>
  </div>
  <form method="post">
    <div class="form-group">
      <label for="inputNome">Nome</label>
      <input type="text" name="nome" class="form-control" placeholder="Nome do paciente" required>
    </div>
    <div class="form-group">
      <label for="inputValor">Valor</label>
      <input type="text" name="valor" class="form-control" placeholder="Valor do plano" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>
<?php
require 'include/page/footer.php';

?>
