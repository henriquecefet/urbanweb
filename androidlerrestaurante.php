<?php
$host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = de04qoln4k3dbd";
$credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";
$db = pg_connect( "$host $port $dbname $credentials"  );

$idcidade = $_GET['id'];

$sql =<<<EOF
   SELECT * from urban.restaurante where idcidade = $idcidade order by idrestaurante;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
 exit;
}
 $response["restaurante"] = array();
while($row = pg_fetch_row($ret)) {
   $comida = array();
   $comida["id"] = $row[0];
   $comida["nome"] = $row[1];
   $comida["imagem"] = $row[4];
   $comida["latitude"] = $row[2];
   $comida["longitude"] = $row[3];
   array_push($response["restaurante"], $comida);
}
echo json_encode($response);
pg_close($db);
?>
