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
       <p>Lista de Comentarios</p>
     </div>
        <div class="container">

<?php
$host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = de04qoln4k3dbd";
$credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";
$db = pg_connect( "$host $port $dbname $credentials"  );

$idhotspot = $_GET['id'];

$sql =<<<EOF
   SELECT * from urban.comentario where idhotspot = $idhotspot;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
 exit;
}
while($row = pg_fetch_row($ret)) {
  echo "<img src='$row[2]' style='max-height: 140px;max-width:130px;'>". "<br>";
  echo "NOME = ". $row[1] ."\n". "<br>";
  echo "MENSAGEM = ". $row[3] ."\n". "<br>";
  echo "<a href='deletarcomentario.php?id= $row[0]'>Deletar Comentario</a>". "<br>";
}
pg_close($db);
?>
</div>
  </body>
</html>
