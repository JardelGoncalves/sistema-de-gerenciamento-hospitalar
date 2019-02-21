<?php
require 'config.php';
require 'include/page/security.php';
require 'include/cadastrar_paciente.php';

use Repository\PlanoRepository;

$planos = PlanoRepository::findAll();
if(count($planos) === 0):
  $_SESSION['erro'] = 'Para cadastrar um paciente, é preciso ter no mínimo um plano cadastrado';
  header('location: /dashboard/plano/cadastrar');
endif;

require 'include/page/head.php';

?>

<div class="col-md-8 offset-md-2 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Cadastrar Paciente</h2>
    <hr>
  </div>
  <form method="post">
    <div class="form-group">
      <label for="inputNome">Nome</label>
      <input type="text" name="nome" class="form-control" placeholder="Nome do paciente" required>
    </div>
    <div class="form-group">
      <label for="inputCPF">CPF</label>
      <input type="text" name="cpf" class="form-control" placeholder="CPF" required>
    </div>
    <div class="form-group">
      <label for="inputTelefone">Telefone</label>
      <input type="text" name="telefone" class="form-control" placeholder="Telefone" required>
    </div>
    <br>
    <div class="separator">Endereço</div>
    <div class="form-group">
      <label for="inputRua">Rua</label>
      <input type="text" name="rua" class="form-control" placeholder="Rua" required>
    </div>
    <div class="row">
      <div class="form-group col-md-7">
        <label for="inputCidade">Cidade</label>
        <input type="text" name="cidade" class="form-control" placeholder="Cidade" required>
      </div>
      <div class="form-group col-md-5">
        <label for="inputBairro">Bairro</label>
        <input type="text" name="bairro" class="form-control" placeholder="Bairro" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputEstado">Estado</label>
        <input type="text" name="estado" class="form-control" placeholder="Estado (UF)" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCEP">CEP</label>
        <input type="text" name="cep" class="form-control" placeholder="CEP" required>
      </div>
    </div>
    <div class="form-group">
      <label for="SelectPlano">Plano</label>
      <select class="form-control" name="plano">
        <? foreach($planos as $plano){ ?>
        <option value="<? echo $plano['id']; ?>"><? echo $plano['nome']; ?></option>
        <? } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>
<?php
require 'include/page/footer.php';

?>
