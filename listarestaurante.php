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
       <p>Lista de Restaurantes</p>
     </div>
        <div class="container">

<?php
   $idcidade = $_GET['id'];

   $sql =<<<EOF
      SELECT * from urban.restaurante where idcidade = $idcidade order by idrestaurante ;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
        echo pg_last_error($db);
    exit;
   }
   while($row = pg_fetch_row($ret)) {
      echo "<img src='$row[4]' style='max-height: 140px;max-width:130px;'>". "<br>";
      echo "ID = ". $row[0] . "\n". "<br>";
      echo "NOME = ". $row[1] ."\n". "<br>";
      echo "LATITUDE = ". $row[2] ."\n". "<br>";
      echo "LONGITUDE =  ".$row[3] ."\n\n". "<br>";
      echo "<a href='editarrestaurante.php?id= $row[0]'>Editar Restaurante</a>". "<br>";
      echo "<a href='deletarrestaurante.php?id= $row[0]'>Deletar Restaurante</a>". "<br>";
   }
   echo "Operation done successfully\n". "<br>";
   pg_close($db);
?>
</div>
  </body>
</html>
