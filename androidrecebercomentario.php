<?php
include("conexao.php");
include("max.php");
?>
<?php
$username = $_GET['username'];
$foto = $_GET['foto'];
$mensagem = $_GET['mensagem'];
$idhotspot = $_GET['idhotspot'];
$maxId = maxId("urban.comentario", "idcomentario") + 1;
$sql =<<<EOF
   INSERT INTO urban.comentario(idcomentario, username ,foto ,mensagem, idhotspot)
   VALUES ($maxId, '$username', '$foto', '$mensagem', $idhotspot);
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
