<?php
session_start();
if (!isset($_SESSION['conectado']))
{
  header('Location: login.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Urbam Explorer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>Urban Explorer</h1>
  <p>Cadastro de Cidade</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Cadastro</h3>
      <form action="cadastro2.php" method="post">
        <p>ID:</p><br>
        <input type="text" name="idcidade" id="idcidade" value=""><br>
        <p>Nome:</p><br>
        <input type="text" name="nome" id="nome" value=""><br>
        <p>Link da imagem:</p><br>
        <input type="text" name="linkimagem" id="linkimagem" value=""><br>
        <p>Latitude:</p><br>
        <input type="text" name="latitude" id="latitude" value=""><br>
        <p>Longitude:</p><br>
        <input type="text" name="longitude" id="longitude" value=""><br>
        <br>

        <input type="submit" id="Submit" value="Submit">
      </form>
    </div>
</div>

</body>
</html>
