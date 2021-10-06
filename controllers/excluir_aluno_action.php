<?php
  include '../config.php';

  $id = $_GET['id'];

  $sql = $pdo->prepare('DELETE FROM students WHERE id = :id');
  $sql->bindValue(':id', $id);
  $sql->execute();

  header("Location: http://localhost/mapa/ra200854915/views/alunos.php");
  exit;


  







