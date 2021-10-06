<?php

session_start();

$ra = '200854915';

$senha = 'gustavo';

$inputRA = filter_input(INPUT_POST, 'number-ra');
$inputPassword = filter_input(INPUT_POST, 'password');

if($inputRA && $inputPassword) {
  if($inputRA == $ra && $inputPassword == $senha) {
    $_SESSION['ra'] = $inputRA;
    header("Location: http://localhost/mapa/ra200854915/views/alunos.php");
    exit;
  }
}

header("Location: http://localhost/mapa/ra200854915");
exit;
?>