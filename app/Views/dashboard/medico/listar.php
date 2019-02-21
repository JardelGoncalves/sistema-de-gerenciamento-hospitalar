<?php
require 'config.php';
require 'include/page/security.php';

use Repository\MedicoRepository;
$medicos = MedicoRepository::findAll();

require 'include/page/head.php';
?>

<div class="col-md-10 offset-md-1 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Médicos</h2>
    <hr>
  </div>
  <?
  require 'include/page/sucesso.php';
  require 'include/page/erro.php';
  ?>
  <div class="row">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">CRM</th>
            <th scope="col">Especialidades</th>
            <th scope="col">ações</th>
          </tr>
        </thead>
        <tbody>
          <?
          foreach ($medicos as $medico) {
          ?>
          <tr>
            <td><?echo $medico['nome']; ?></td>
            <td><?echo $medico['crm']; ?></td>
            <td><?echo $medico['Especialidades']; ?></td>
            <td>
              <a class="btn btn-danger" href="/dashboard/medico/remover?id=<?echo $medico['id']; ?>">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          <? } ?>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</div>

<?php
require 'include/page/footer.php';
?>
