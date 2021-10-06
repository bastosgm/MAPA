<?php
  include '../config.php';

  $id = $_GET['id'];

  $sql = $pdo->prepare('DELETE FROM courses WHERE id = :id');
  $sql->bindValue(':id', $id);
  $sql->execute();

  header("Location: http://localhost/mapa/ra200854915/views/cursos.php");
  exit;


  







