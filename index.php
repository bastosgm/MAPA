<?php 
session_start();

if(isset($_SESSION['ra'])) {
  if($_SESSION['ra'] == "200854915"){
    header("Location: http://localhost/mapa/ra200854915/views/alunos.php");
    exit; 
  };
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MAPA | Login</title>
    <!-- Bootstrap core CSS -->
    <link href="../denovo/assets/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="text-center container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <form class="form-signin" style="width: 30%" action="./controllers/login.php" method="POST">
      <h1 class="h1 mb-5 font-weight-normal">Welcome again to MAPA!</h1>
      <label for="number-ra" class="sr-only">User</label>
      <input type="text" name="number-ra" id="number-ra" class="form-control" placeholder="User" required autofocus>
      <label for="password" class="sr-only">Senha</label>
      <input type="password" name="password" id="password" class="mt-3 form-control" placeholder="Password" required>
      <button class="mt-4 btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </body>
</html>