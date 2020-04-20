<?php
include("conexao.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Urban Explorer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="redirect.js"></script>
  </head>
  <body>
  <div class="jumbotron text-center">
  <h1 onclick="redirectIndex()">Urban Explorer</h1>
  <p>Administrador Web</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Menu</h3>
        <a href="lista.php">  <p>Lista de Cidades</p></a>      <br>
        <a href="cadastro.php">  <p>Cadastro de Cidades</p></a>      <br>

    </div>
</div>

</body>
</html>
