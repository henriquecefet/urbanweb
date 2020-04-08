<?php
include("conexao.php");
<?php
$host        = "host = 127.0.0.1";
$port        = "port = 5435";
$dbname      = "dbname = urban";
$credentials = "user = postgres password=ursopanda";

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
   }
   pg_close($db);
?>
