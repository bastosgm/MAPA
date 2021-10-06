<?php
  include_once '../config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <title>MAPA | Gustavo Bastos</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">L</span>
      </button> -->
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
          <a href="#" class="navbar-brand"><strong>MAPA</strong></a>
          <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="./alunos.php"><strong>Students</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./cursos.php"><strong>Courses</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controllers/deslogar.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</body>