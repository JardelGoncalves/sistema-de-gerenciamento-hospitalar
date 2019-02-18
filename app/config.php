<?php

session_start();

spl_autoload_register(function($filename){
  $path = 'core' . DIRECTORY_SEPARATOR . $filename . '.php';

  if (DIRECTORY_SEPARATOR == '/') {
    $path = str_replace('\\', '/', $path);
  }

  if (file_exists($path)) {
    require $path;
  } else {
    echo 'Erro ao importar o arquivo: ' . $path;
  }
})

 ?>
