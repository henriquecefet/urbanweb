<?php
include("conexao.php");
?>
<?php
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
