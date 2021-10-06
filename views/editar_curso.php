<?php
  include_once '../config.php';
  include_once '../models/Courses.php';

  $id = $_GET['id'];


  $sql = $pdo->query("SELECT * FROM courses WHERE id =".$id);
  $course = [];

  if($sql->rowCount() > 0){
    $data = $sql->fetch();

    $course1 = new Courses();
    $course1->setId($data['id']);
    $course1->setNameCourse($data['nameCourse']);
    $course1->setDescription($data['description']);
    $course1->setDateStart($data['dateStart']);
    $course1->setDateFinish($data['dateFinish']);
    $course1->setStatus($data['status']);

    $course[] = $course1;

    
  }


?>

  <?php include_once './header.php'?>


  <main class="d-flex container align-items-center" style="height: calc(100vh - 56px); ">
    <div class="container-fluid border rounded p-5" style="box-shadow: 1px 2px 6px 4px rgba(0,0,0,0.1)">

      <form action="../controllers/editar_curso_action.php" method="POST" class="mt-5">
        <div class="row mt-4">
          <div class="col-md-7">
            <p class="fw-bold">Course Name:</p>
          </div>
          <div class="col-md-3">
            <p class="fw-bold">Status:</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <input type="text" style="display: none;" class="form-control" name="id" id="id" aria-describedby="id" value="<?=$course[0]->getId();?>">
          </div>
          <div class="col-md-7">
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" value="<?=$course[0]->getNameCourse();?>">
          </div>
          <div class="col-md-5">
            <select class="form-control" aria-label="Selecione" name="status">
              <option value="1" <?php if($course[0]->getStatus() == 1) echo 'selected';?>>Active</option>
              <option value="0" <?php if($course[0]->getStatus() == 0) echo 'selected';?>>Inactive</option>
            </select>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6">
            <p class="fw-bold">Start Date:</p>
          </div>
          <div class="col-md-6">
            <p class="fw-bold">End date:</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"><input type="date" class="form-control" name="dateStart" id="dateStart" aria-describedby="dateStart" value="<?=date('Y-m-d', strtotime($course[0]->getDateStart()));?>"></div>
          <div class="col-md-6"><input type="date" class="form-control" name="dateFinish" id="dateFinish" aria-describedby="dateFinish" value="<?=date('Y-m-d', strtotime($course[0]->getDateFinish()));?>"></div>
        </div>
        <div class="row mt-4">
          <div class="col-md-12">
            <p class="fw-bold">Description:</p>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-12">
            <textarea style="resize: none;height: 100px;" class="form-control" name="description" id="description" aria-describedby="description"><?=$course[0]->getDescription();?></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a type="button" href="./cursos.php" class="btn btn-danger"><strong>Cancel<strong></a>
          <button type="submit" class="btn btn-success mr-2"><strong>Save<strong></button>
        </div>
      </form>
    </div>
  </main>

</body>

</html>