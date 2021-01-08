<?php
include("conexao.php");
?>
<?php
$nome = $_GET['cidade'];
$sql =<<<EOF
   SELECT * from urban.cidade where urban.cidade.nome = '$nome';
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
   $cidade["estado"] = $row[5];
   $cidade["pais"] = $row[6];
   array_push($response["cidades"], $cidade);
}
echo json_encode($response);
pg_close($db);