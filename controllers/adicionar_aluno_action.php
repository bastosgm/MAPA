<?php
  include '../config.php';
  include '../models/Student.php';

  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password');
  $status = filter_input(INPUT_POST, 'status');
  $phone = filter_input(INPUT_POST, 'phone');
  $course = filter_input(INPUT_POST, 'course');

  if($name && $email && $password && $status && $course) {

    $newStudent = new Student();
    $newStudent->setName($name);
    $newStudent->setEmail($email);
    $newStudent->setPassword($password);
    $newStudent->setStatus($status);
    $newStudent->setPhone($phone);
    $newStudent->setCourse($course);  

  }
  
  $sql = $pdo->prepare("INSERT INTO students (name, email, status, phone, course, password) VALUES (:name, :email, :status, :phone, :course, :password)");

  $sql->bindValue(":name", $newStudent->getName());
  $sql->bindValue(":email", $newStudent->getEmail());
  $sql->bindValue(":status", $newStudent->getStatus());
  $sql->bindValue(":phone", $newStudent->getPhone());
  $sql->bindValue(":course", $newStudent->getCourse());
  $sql->bindValue(":password", $newStudent->getPassword());
  $sql->execute();

  $newStudent->setId($pdo->lastInsertId());

  if($newStudent->getId()) {
    header("Location: http://localhost/mapa/ra200854915/views/alunos.php");
    exit;
  }

  







