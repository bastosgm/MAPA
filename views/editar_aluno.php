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

  $sql2 = $pdo->query('SELECT * FROM courses');

  $array2 = [];

  if($sql2->rowCount() > 0) {
    $data2 = $sql2->fetchAll();

    foreach($data2 as $item) {
      $courses = new Courses();
      $courses->setId($item['id']);
      $courses->setNameCourse($item['nameCourse']);
      $courses->setDescription($item['description']);
      $courses->setDateStart($item['dateStart']);
      $courses->setDateFinish($item['dateFinish']);
      $courses->setStatus($item['status']);
      $courses->setCreatedAt($item['created_at']);
      $courses->setUpdatedAt($item['updated_at']);
      $array2[] = $courses;
    }

  }
  

?>

  <?php include_once './header.php'?>


  <main class="d-flex container align-items-center" style="height: calc(100vh - 56px); ">
    <div class="container-fluid border rounded p-5" style="box-shadow: 1px 2px 6px 4px rgba(0,0,0,0.1)">

      <form action="../controllers/editar_aluno_action.php" method="POST" class="mt-5">
        <div class="row mt-4">
          <div class="col-md-7">
            <p class="fw-bold">Name:</p>
          </div>
          <div class="col-md-3">
            <p class="fw-bold">Status:</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <input style="display: none;" type="text" class="form-control" name="id" id="id" aria-describedby="id" value="<?=$student[0]->getId();?>">
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" value="<?=$student[0]->getName();?>">
          </div>
          <div class="col-md-5">
            <select class="form-control" aria-label="Selecione" name="status">
              <option value="1" <?php if($student[0]->getStatus() == 1) echo 'selected'; ?>>Active</option>
              <option value="0" <?php if($student[0]->getStatus() == 0) echo 'selected'; ?>>Inactive</option>
            </select>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-4">
            <p class="fw-bold">Phone:</p>
          </div>
          <div class="col-md-8">
            <p class="fw-bold">Course:</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone" value="<?=$student[0]->getPhone();?>">
          </div>
          <div class="col-md-8">
            <select class="form-control" aria-label="Selecione" name="course">
              <option selected="">-Choose-</option>
              <?php foreach($array2 as $item) :?>
              <option value="<?=$item->getId();?>" <?php if($student[0]->getCourse() == $item->getId()) echo 'selected'; ?>><?=$item->getNameCourse();?></option>
              <?php endforeach;?>
            </select></div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6">
            <p class="fw-bold">Email:</p>
          </div>
          <div class="col-md-6">
            <p class="fw-bold">Password:</p>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-6">
            <input type="email" class="form-control" name="email" id="email" aria-describedby="email" value="<?=$student[0]->getEmail();?>">
          </div>
          <div class="col-md-6">
            <input type="password" class="form-control" name="password" id="password" aria-describedby="password" value="<?=$student[0]->getPassword();?>">
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a type="button" href="./alunos.php" class="btn btn-danger"><strong>Cancel</strong></a>
          <button type="submit" class="btn btn-success mr-2"><strong>Save</strong></button>
        </div>
        </form>
    </div>
  </main>

</body>

</html>