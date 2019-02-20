<?php

require 'include/friendly_url.php';

$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');
$POS = strpos($REQUEST_URI, '?'); //pos do ? na url (caso exista)

if ($POS): // se existir
  $REQUEST_URI = substr($REQUEST_URI, 0, $POS); // retorna apenas a url (sem query string)
endif;

$REQUEST_URI = substr($REQUEST_URI, 1); // remove a / (raiz) incial da url

$URL = explode('/', $REQUEST_URI); // cria um array com todos os niveis da url

$URL[0] = ($URL[0] !== '' ? $URL[0] : 'login');

include file_include($URL);
