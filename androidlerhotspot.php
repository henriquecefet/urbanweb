<?php
$host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = de04qoln4k3dbd";
$credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";
$db = pg_connect( "$host $port $dbname $credentials"  );

$idcidade = $_GET['id'];

$sql =<<<EOF
   SELECT * from urban.hotspot where idcidade = $idcidade order by idhotspot;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
 exit;
}
 $response["hotspot"] = array();
while($row = pg_fetch_row($ret)) {
   $hotspot = array();
   $hotspot["id"] = $row[0];
   $hotspot["nome"] = $row[2];
   $hotspot["imagem"] = $row[1];
   $hotspot["latitude"] = $row[3];
   $hotspot["longitude"] = $row[4];
   array_push($response["hotspot"], $hotspot);
}
echo json_encode($response);
pg_close($db);
?>
