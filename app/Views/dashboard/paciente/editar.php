<?php
require 'config.php';
require 'include/page/security.php';
require 'include/editar_paciente.php';

use Repository\PlanoRepository;
use Repository\PacienteRepository;

$planos = PlanoRepository::findAll();

if(count($planos) === 0):
  $_SESSION['erro'] = 'Para cadastrar um paciente, é preciso ter no mínimo um plano cadastrado';
  header('location: /dashboard/plano/cadastrar');
endif;

if($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['id'])) {
  $_SESSION['erro'] = 'Paciente não selecionado!';
  header('location: /dashboard/paciente/listar');
}

$paciente = PacienteRepository::findById($_GET['id']);
if(!$paciente) {
  $_SESSION['erro'] = 'Paciente não selecionado!';
  header('location: /dashboard/paciente/listar');
}

require 'include/page/head.php';

?>

<div class="col-md-8 offset-md-2 col-sm-12" style="margin-top:80px">
  <div style="margin-bottom:20px">
    <h2>Editar Paciente</h2>
    <hr>
  </div>
  <form method="post">
    <div class="form-group">
      <label for="inputId">ID</label>
      <input type="text" value="<? echo $paciente['id']; ?>" name="id" class="form-control" readonly>
    </div>
    <div class="form-group">
      <label for="inputNome">Nome</label>
      <input type="text" value="<? echo $paciente['nome']; ?>" name="nome" class="form-control" placeholder="Nome do paciente" required>
    </div>
    <div class="form-group">
      <label for="inputCPF">CPF</label>
      <input type="text" value="<? echo $paciente['cpf']; ?>" name="cpf" class="form-control" placeholder="CPF" required>
    </div>
    <div class="form-group">
      <label for="inputTelefone">Telefone</label>
      <input type="text" value="<? echo $paciente['telefone']; ?>" name="telefone" class="form-control" placeholder="Telefone" required>
    </div>
    <br>
    <div class="separator">Endereço</div>
    <div class="form-group">
      <label for="inputRua">Rua</label>
      <input type="text" value="<? echo $paciente['rua']; ?>" name="rua" class="form-control" placeholder="Rua" required>
    </div>
    <div class="row">
      <div class="form-group col-md-7">
        <label for="inputCidade">Cidade</label>
        <input type="text" value="<? echo $paciente['cidade']; ?>" name="cidade" class="form-control" placeholder="Cidade" required>
      </div>
      <div class="form-group col-md-5">
        <label for="inputBairro">Bairro</label>
        <input type="text" value="<? echo $paciente['bairro']; ?>" name="bairro" class="form-control" placeholder="Bairro" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputEstado">Estado</label>
        <input type="text" value="<? echo $paciente['estado']; ?>" name="estado" class="form-control" placeholder="Estado (UF)" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCEP">CEP</label>
        <input type="text" value="<? echo $paciente['cep']; ?>" name="cep" class="form-control" placeholder="CEP" required>
      </div>
    </div>
    <div class="form-group">
      <label for="SelectPlano">Plano</label>
      <select class="form-control" name="plano">
        <? foreach($planos as $plano){
              if($paciente['plano_id'] === $plano['id']){ ?>
                <option selected value="<? echo $plano['id']; ?>"><? echo $plano['nome']; ?></option>
              <?
              } else {
              ?>
              <option value="<? echo $plano['id']; ?>"><? echo $plano['nome']; ?></option>
        <? }} ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>
<?php
require 'include/page/footer.php';

?>
