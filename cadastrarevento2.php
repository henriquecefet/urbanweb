<?php
include("conexao.php");
?>
<?php
$host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = de04qoln4k3dbd";
$credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $idevento = $_REQUEST["idevento"];
     $idhotspot = $_REQUEST["hotspot"];
     $nome = $_REQUEST["nome"];
     $imagem = $_REQUEST["linkimagem"];
     $link= $_REQUEST["link"];
   }

   $sql =<<<EOF
      INSERT INTO urban.evento (idhotspot, nome ,link ,imagem, idevento)
      VALUES ($idhotspot, '$nome', '$link', '$imagem',  $idevento );

EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
      header('Location: listaevento.php?id='.$idhotspot);
   }
   pg_close($db);
?>
