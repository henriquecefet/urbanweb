<?php
include("conexao.php");
?>
<?php
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
