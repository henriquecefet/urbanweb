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
  <p>Editar Hotspot</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
          <h3>Editar Hotspot</h3>
                <form action="editarhotspot2.php" method="post">
                  <?php
                         $idhotspot = $_GET['id'];
                         $sql =<<<EOF
                            SELECT * from urban.hotspot where idhotspot = $idhotspot;
EOF;
                      $ret = pg_query($db, $sql);
                      if(!$ret) {
                           echo pg_last_error($db);
                       exit;
                      }
                      while($row = pg_fetch_row($ret)) {
                         echo "<p>Link da imagem:</p><br>";
                         echo "<input type='text' name='linkimagem' id='linkimagem' value='$row[1]'><br>";
                         echo "<p>Nome:</p><br>";
                         echo "<input type='text' name='nome' id='nome' value='$row[2]'><br>";
                         echo "<p>Latitude:</p><br>";
                         echo "<input type='text' name='latitude' id='latitude' value='$row[3]'><br>";
                         echo "<p>Longitude:</p><br>";
                         echo "<input type='text' name='longitude' id='longitude' value='$row[4]'><br>";
                         echo "<p>Site:</p><br>";
                         echo "<input type='text' name='site' id='site' value='$row[5]'><br>";
                         echo "<input type='checkbox' id='arlivre' name='arlivre' value='t'>";
                         echo "<label for='arlivre'> Ar livre</label><br>";
                         echo "<input type='hidden' value='$idhotspot' name='idhotspot' id='idhotspot'>";
                         echo "<input type='hidden' value='$row[6]' name='idcidade' id='idcidade'>";
                      
  
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
