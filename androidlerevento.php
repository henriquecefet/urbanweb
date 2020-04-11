<?php
$host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = de04qoln4k3dbd";
$credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";
$db = pg_connect( "$host $port $dbname $credentials"  );

$idhotspot = $_GET['id'];

$sql =<<<EOF
   SELECT * from urban.evento where idhotspot = $idhotspot order by idevento;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
 exit;
}
 $response["evento"] = array();
while($row = pg_fetch_row($ret)) {
   $eventohotspot = array();
   $eventohotspot["id"] = $row[0];
   $eventohotspot["nome"] = $row[2];
   $eventohotspot["imagem"] = $row[1];
   $eventohotspot["site"] = $row[4];
   array_push($response["evento"], $eventohotspot);
}
echo json_encode($response);
pg_close($db);
?>

