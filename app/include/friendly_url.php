<?php

/**
* Esta função recebe array contendo a URL divida em niveis
* com isso, a mesma trata a requisição e retorna uma string
* sendo a caminho do arquivo que deve ser incluido
* @param  array  $url URL informada pelo usuário;
*
* @return string
*/
function file_include(array $url) : string {
  $PATH = 'Views/'; // onde estão as páginas

  // percorre o array contendo cada parte da url
  foreach($url as $key => $value){
    $file = $PATH . $value . '.php'; // cria um caminho como se fosse para um arquivo

    // verifica se o arquivo existe
    if (file_exists( $file )) {
      // verifica se ele é o ultimo nivel da url
      if($key === count($url) - 1) {
        return $file; // retorna o caminho
      } else {
        // caso não seja o ultimo nivel da url, incrementa a
        // variável $PATH
        $PATH .= $value . '/';
      }
      // caso o arquivo não exista, verifica se é um diretório
    } elseif (is_dir($PATH . $value)) {
      // verifica se o diretório é o último nivel da url
      if($key === count($url) - 1) {
        // retorna a página 404
        return 'Views/404.php';
      } else {
        // caso não seja o ultimo nivel da url, incrementa a
        // variável $PATH
        $PATH .= $value . '/';
      }
    } else {
      // para qualquer outra situação, retorna 404
      return 'Views/404.php';
    }
  }
}
