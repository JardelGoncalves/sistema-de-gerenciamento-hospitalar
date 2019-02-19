<?php
use Repository\UsuarioRepository;
if ($_SESSION['usuario']) {
  $user = UsuarioRepository::findById($_SESSION['usuario']);
  if(!$user){
    $_SESSION['erro'] = 'Área restrita para usuário cadastrado!';
    header('location: /');
    die();
  }
} else {
  $_SESSION['erro'] = 'Área restrita para usuário cadastrado!';
  header('location: /');
  die();
}
?>
