  <?php 

  include_once './header.php';
  include_once '../config.php';

  include_once '../models/Student.php';

  $sql = $pdo->query("SELECT * FROM Students");

  $array = [];

  if($sql->rowCount() > 0){

    $data = $sql->fetchAll();

    foreach($data as $row) {
      $student = new Student();
      $student->setId($row['id']);
      $student->setName($row['name']);
      $student->setEmail($row['email']);
      $student->setPassword($row['password']);
      $student->setPhone($row['phone']);
      $student->setCourse($row['course']);
      $student->setStatus($row['status']);
      $student->setCreatedAt($row['created_at']);
      $student->setUpdatedAt($row['updated_at']);

      $array[] = $student;
    }
  }

  ?>

  <main class="d-flex container align-items-center" style="height: calc(100vh - 56px); ">

    <div class="div" style="width: 100%;">
      

      <h1 class="pb-3">Registered Students</h1>
      <div class="row mt-3">
        <table class="table table-hover table-secondary">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
              <th scope="col">Options</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($array as $student): ?>
            <tr>
              <th scope="row" class="align-middle"><?= $student->getId();?></th>
              <td class="align-middle"><?=$student->getName();?></td>
              <td class="align-middle"><?php if($student->getStatus() == 1) {echo 'Active';} else {echo 'Inactive';}?></td>
              <td style="width: 25%">
                <a type="button" class="btn btn-primary" href="./visualizar_aluno.php?id=<?=$student->getId();?>">View</a>
                <a type="button" class="btn btn-secondary" href="./editar_aluno.php?id=<?=$student->getId();?>">Edit</a>
                <a type="button" class="btn btn-danger" href="../controllers/excluir_aluno_action.php?id=<?=$student->getId();?>">Delete</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="row">
        <a type="button" class="btn btn-success" href="./adicionar_aluno.php"><strong>+ Add Student</strong></a>
      </div>
    </div>



  </main>

</body>

</html>