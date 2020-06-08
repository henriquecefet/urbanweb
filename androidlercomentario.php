<?php
include("conexao.php");
?>
<?php
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
