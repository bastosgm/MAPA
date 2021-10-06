<?php
  include_once '../config.php';
  include_once '../models/Student.php';
  include_once '../models/Courses.php';

  $id = $_GET['id'];


  $sql = $pdo->query("SELECT * FROM Students WHERE id =".$id);
  $student = [];

  if($sql->rowCount() > 0){
    $data = $sql->fetch();

    $student1 = new Student();
    $student1->setId($data['id']);
    $student1->setName($data['name']);
    $student1->setEmail($data['email']);
    $student1->setPassword($data['password']);
    $student1->setPhone($data['phone']);
    $student1->setCourse($data['course']);
    $student1->setStatus($data['status']);
    $student1->setCreatedAt($data['created_at']);
    $student1->setUpdatedAt($data['updated_at']);

    $student[] = $student1;

  }

  $sql2 = $pdo->query('SELECT * FROM courses WHERE id ='.$student[0]->getCourse());

  $array2 = [];

  if($sql2->rowCount() > 0) {
    $data2 = $sql2->fetch();

    $courses = new Courses();
    $courses->setId($data2['id']);
    $courses->setNameCourse($data2['nameCourse']);
    $courses->setDescription($data2['description']);
    $courses->setDateStart($data2['dateStart']);
    $courses->setDateFinish($data2['dateFinish']);
    $courses->setStatus($data2['status']);
    $courses->setCreatedAt($data2['created_at']);
    $courses->setUpdatedAt($data2['updated_at']);

    $array2[] = $courses;
  }

?>

  <?php include_once './header.php'?>


  <main class="d-flex container align-items-center" style="height: calc(100vh - 56px); ">
    <div class="container-fluid border rounded p-5" style="box-shadow: 1px 2px 6px 4px rgba(0,0,0,0.1)">
      

      <div class="row mt-5">
        <div class="col-md-3">
          <p class="font-weight-bold">Id:</p>
        </div>
        <div class="col-md-6">
          <p class="font-weight-bold">Name:</p>
        </div>
        <div class="col-md-3">
          <p class="font-weight-bold">Status:</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <p><?=$student[0]->getId();?></p>
        </div>
        <div class="col-md-6">
          <p><?=$student[0]->getName();?></p>
        </div>
        <div class="col-md-3">
          <p><?php if($student[0]->getStatus() == 1) {echo 'Active';} else {echo 'Inactive';}?></p>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-3">
          <p class="font-weight-bold">Phone:</p>
        </div>
        <div class="col-md-6">
          <p class="font-weight-bold">Course:</p>
        </div>
        <div class="col-md-3">
          <p class="font-weight-bold">Registered on:</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <p><?=$student[0]->getPhone();?></p>
        </div>
        <div class="col-md-6">
          <p><?php if($array2) {echo $array2[0]->getNameCourse();} else {echo "-";};?></p>
        </div>
        <div class="col-md-3">
          <p><?=$student[0]->getCreatedAt();?></p>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <p class="font-weight-bold">Email:</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p><?=$student[0]->getEmail();?></p>
        </div>
      </div>
      <a href='./alunos.php' type="button" class="btn btn-primary mt-5"><strong>Back</strong></a>
    </div>
  </main>

</body>

</html>