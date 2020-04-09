<?php
$host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = de04qoln4k3dbd";
$credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";
$sql =<<<EOF
   SELECT * from urban.cidade order by idcidade;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
 exit;
}
 $response["cidades"] = array();
while($row = pg_fetch_row($ret)) {
   $cidade = array();
   $cidade["id"] = $row[0];
   $cidade["nome"] = $row[1];
   $cidade["imagem"] = $row[2];
   $cidade["latitude"] = $row[3];
   $cidade["longitude"] = $row[4];
   array_push($response["cidades"], $cidade);
}
echo json_encode($response);
pg_close($db);




 ?>
