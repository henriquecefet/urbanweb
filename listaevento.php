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
       <p>Lista de Eventos</p>
     </div>
        <div class="container">

<?php
   $idhotspot = $_GET['id'];

   $sql =<<<EOF
      SELECT * from urban.evento where idhotspot = $idhotspot order by idevento ;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
        echo pg_last_error($db);
    exit;
   }
   while($row = pg_fetch_row($ret)) {
      echo "<img src='$row[1]' style='max-height: 140px;max-width:130px;'>". "<br>";
      echo "ID = ". $row[0] . "\n". "<br>";
      echo "NOME = ". $row[2] ."\n". "<br>";
      echo "SITE = ". "<a href='$row[4]'>$row[4]</a>"."\n". "<br>";
      echo "<a href='editarevento.php?id= $row[0]'>Editar Evento</a>". "<br>";
      echo "<a href='excluirevento.php?id= $row[0]'>Excluir Evento</a>". "<br>";

   }
   echo "Operation done successfully\n". "<br>";
   pg_close($db);
?>
</div>
  </body>
</html>
