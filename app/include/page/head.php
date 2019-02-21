<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Gerenciamento Hospitalar</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style media="screen">
      @media only screen and (min-width: 900px) {
        .left-item{
          position: absolute;
          right: 0px;
          margin-right: 10px;
        }
      }
      .separator {
        display: flex;
        align-items: center;
        text-align: center;
        color: #9c9898;
      }
      .separator::before,
      .separator::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #9c9898;
      }
      .separator::before {
        margin-right: .25em;
      }
      .separator::after {
        margin-left: .25em;
      }
    </style>
  </head>
  <body style="background:#f3f3f3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/dashboard">
        <span style="font-size: 24px; color: #5094f5;">
          <i class="fas fa-heartbeat"></i>
        </span>
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard"><i class="fas fa-clinic-medical "></i> Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-injured"></i> Pacientes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/dashboard/paciente/listar">Listar pacientes</a>
              <a class="dropdown-item" href="/dashboard/paciente/cadastrar">Cadastrar Paciente</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-md"></i> Médicos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/dashboard/medico/listar">Listar médico</a>
              <a class="dropdown-item" href="/dashboard/medico/cadastrar">Cadastrar Médico</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-calendar-check "></i> Consultas
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/dashboard/consulta/listar">Listar consultas</a>
              <a class="dropdown-item" href="/dashboard/consulta/search">Marcar consulta</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-file-invoice-dollar"></i> Planos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/dashboard/plano/listar">Planos</a>
              <a class="dropdown-item" href="/dashboard/plano/cadastrar">Cadastrar Plano</a>
            </div>
          </li>
          <li class="nav-item left-item">
            <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container" style="margin-bottom:30px">
