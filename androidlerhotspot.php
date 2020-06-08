<?php
include("conexao.php");
?>
<?php
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
   $hotspot["site"] = $row[5];
   $hotspot["idcidade"] = $row[6];
   array_push($response["hotspot"], $hotspot);
}
echo json_encode($response);
pg_close($db);
?>
