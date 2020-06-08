<?php
include("verificarlogin.php");
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
  <p>Cadastro de Cidade</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
          <h3>Editar Cidade</h3>
                <form action="editarcidade2.php" method="post">
                  <?php
                         $idcidade = $_GET['id'];
                         $sql =<<<EOF
                            SELECT * from urban.cidade where idcidade = $idcidade;
EOF;
                      $ret = pg_query($db, $sql);
                      if(!$ret) {
                           echo pg_last_error($db);
                       exit;
                      }
                      while($row = pg_fetch_row($ret)) {
                         echo "<p>Link da imagem:</p><br>";
                         echo "<input type='text' name='linkimagem' id='linkimagem' value='$row[2]'><br>";
                         echo "<p>Nome:</p><br>";
                         echo "<input type='text' name='nome' id='nome' value='$row[1]'><br>";
                         echo "<p>Latitude:</p><br>";
                         echo "<input type='text' name='latitude' id='latitude' value='$row[3]'><br>";
                         echo "<p>Longitude:</p><br>";
                         echo "<input type='text' name='longitude' id='longitude' value='$row[4]'><br>";
                         echo "<input type='hidden' value='$idcidade' name='cidade' id='cidade'>";
                         break;
                      }
                      echo "Operation done successfully\n". "<br>";
                      pg_close($db);
                  ?>
                  <input type="submit" id="Submit" value="Submit">
                </form>
    </div>
</div>

</body>
</html>
