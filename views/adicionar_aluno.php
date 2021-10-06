<?php 
  include '../config.php';
  include '../models/Courses.php';

  $sql = $pdo->query("SELECT * FROM courses");

  $array = [];

  if($sql->rowCount() > 0){

  $data = $sql->fetchAll();

  foreach($data as $row) {
    $courses = new Courses();
    $courses->setId($row['id']);
    $courses->setNameCourse($row['nameCourse']);
    $courses->setDescription($row['description']);
    $courses->setDateStart($row['dateStart']);
    $courses->setDateFinish($row['dateFinish']);
    $courses->setStatus($row['status']);
    $courses->setCreatedAt($row['created_at']);
    $courses->setUpdatedAt($row['updated_at']);

    $array[] = $courses;
  }

}

?>

  <?php include_once './header.php'?>


  <main class="d-flex container align-items-center" style="height: calc(100vh - 56px); ">
    <div class="container-fluid border rounded p-5" style="box-shadow: 1px 2px 6px 4px rgba(0,0,0,0.1)">
      

      <form action="../controllers/adicionar_aluno_action.php" method="POST" class="mt-5" >
        <div class="row mt-4">
          <div class="col-md-7">
            <p class="fw-bold">Name:</p>
          </div>
          <div class="col-md-3">
            <p class="fw-bold">Status:</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7"><input type="text" class="form-control" name="name" id="name" aria-describedby="name"></div>
          <div class="col-md-5">
            <select class="form-control" aria-label="Selecione" name="status">
              <option>-Choose-</option>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
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
          <div class="col-md-4"><input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone"></div>
          <div class="col-md-8">
            <select class="form-control" aria-label="Selecione" name="course">
              <option selected="">-Choose-</option>
              <?php foreach($array as $course) :?>
                <option value="<?=$course->getId();?>"><?=$course->getNameCourse();?></option>
              <?php endforeach; ?>
            </select>
          </div>
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
          <div class="col-md-6"><input type="email" class="form-control" name="email" id="email" aria-describedby="email"></div>
          <div class="col-md-6"><input type="password" class="form-control" name="password" id="password" aria-describedby="password"></div>
        </div>
        <div class="d-flex justify-content-between">
          <a type="button" href="./alunos.php" class="btn btn-danger">Cancel</a>
          <button type="submit" class="btn btn-success mr-2">Save</button>
        </div>
        </form>
    </div>
  </main>

</body>

</html>