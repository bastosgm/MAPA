<?php
  include '../config.php';
  include '../models/Courses.php';

  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  $status = filter_input(INPUT_POST, 'status');
  $dateStart = filter_input(INPUT_POST, 'dateStart');
  $dateFinish = filter_input(INPUT_POST, 'dateFinish');

  if($name && $description) {
    $newCourse = new Courses();
    $newCourse->setNameCourse($name);
    $newCourse->setDescription($description);
    $newCourse->setDateStart($dateStart);
    $newCourse->setDateFinish($dateFinish);
    $newCourse->setStatus($status);

  }
  
  $sql = $pdo->prepare("INSERT INTO Courses (nameCourse, description, dateStart, dateFinish, status) VALUES (:nameCourse, :description, :dateStart, :dateFinish, :status)");

  $sql->bindValue(":nameCourse", $newCourse->getNameCourse());
  $sql->bindValue(":description", $newCourse->getDescription());
  $sql->bindValue(":dateStart", $newCourse->getDateStart());
  $sql->bindValue(":dateFinish", $newCourse->getDateFinish());
  $sql->bindValue(":status", $newCourse->getStatus());
  $sql->execute();

  $newCourse->setId($pdo->lastInsertId());

  if($newCourse->getId()) {
    header("Location: http://localhost/mapa/ra200854915/views/cursos.php");
    exit;
  }

  







