<?php
include("conexao.php");
?>
<?php
$nomecidade = $_GET['nome'];

$sql =<<<EOF
   select urban.hotspot.* from urban.hotspot join urban.cidade on (urban.hotspot.idcidade = urban.cidade.idcidade and urban.cidade.nome = '$nomecidade');
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