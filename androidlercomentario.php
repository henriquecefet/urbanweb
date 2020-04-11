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
 $response["comentario"] = array();
while($row = pg_fetch_row($ret)) {
   $opiniao = array();
   $opiniao["username"] = $row[1];
   $opiniao["foto"] = $row[2];
   $opiniao["mensagem"] = $row[3];
   array_push($response["comentario"], $opiniao);
}
echo json_encode($response);
pg_close($db);
?>
