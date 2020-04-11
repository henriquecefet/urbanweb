<?php
$host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = de04qoln4k3dbd";
$credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";
$db = pg_connect( "$host $port $dbname $credentials"  );

$username = $_GET['username'];
$foto = $_GET['foto'];
$mensagem = $_GET['mensagem'];
$idhotspot = $_GET['idhotspot'];
$sql =<<<EOF
   INSERT INTO urban.comentario(username ,foto ,mensagem, idhotspot)
   VALUES ('$username', '$foto', '$mensagem', $idhotspot );

EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
 exit;
}
$response = "sucesso";
echo json_encode($response);
pg_close($db);
?>
