<?php
use Repository\UsuarioRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $user = UsuarioRepository::findByEmailAndPassword($email, $senha);

  if ($user) {
    $_SESSION['usuario'] = $user['id'];
    header('location: dashboard.php');
  }
  else {
    $_SESSION['erro'] = 'Email ou Senha inválida!';
  }
}
?>
