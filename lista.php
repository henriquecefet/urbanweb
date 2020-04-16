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
  </head>
   <body>
     <div class="jumbotron text-center">
       <h1>Urban Explorer</h1>
       <p>Lista de cidades</p>
     </div>
        <div class="container">

<?php
   $sql =<<<EOF
      SELECT * from urban.cidade order by idcidade;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
        echo pg_last_error($db);
    exit;
   }
   while($row = pg_fetch_row($ret)) {
     echo "<p>";
      echo "<img src='$row[2]' style='max-height: 140px;max-width:130px;'>". "<br>";
      echo "ID = ". $row[0] . "\n". "<br>";
      echo "NOME = ". $row[1] ."\n". "<br>";
      echo "LATITUDE = ". $row[3] ."\n". "<br>";
      echo "LONGITUDE =  ".$row[4] ."\n\n". "</p><br>";
      echo "<a href='listahotspots.php?id= $row[0]'>Lista de Hotspots</a>". "<br>";
      echo "<a href='cadastrohotspots.php?id= $row[0]'>Cadastro de Hotspots</a>". "<br>";
      echo "<a href='editarcidade.php?id= $row[0]'>Editar Cidade</a>". "<br>";
      echo "<a href='listarestaurante.php?id= $row[0]'>Lista de Restaurantes</a>". "<br>";
      echo "<a href='cadastrorestaurante.php?id= $row[0]'>Cadastro de Restaurantes</a>". "<br>";
      echo "<a href='deletarcidade.php?id= $row[0]'>Deletar Cidade e seus Hotspots</a>". "<br>";
      echo "</p>";
   }
   echo "Operation done successfully\n". "<br>";
   pg_close($db);
?>
</div>
  </body>
</html>
