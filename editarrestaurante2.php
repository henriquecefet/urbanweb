<?php
include("conexao.php");
 ?>
<?php
   $idrestaurante = $_REQUEST["idrestaurante"];
   $nome = $_REQUEST["nome"];
   $latitude = $_REQUEST["latitude"];
   $longitude = $_REQUEST["longitude"];
   $imagem = $_REQUEST["linkimagem"];
   $idcidade = $_REQUEST["idcidade"];
   $sql =<<<EOF
      UPDATE urban.restaurante set nome = '$nome', latitude = $latitude, longitude = $longitude, imagem = '$imagem' where idrestaurante= $idrestaurante;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record updated successfully\n";
      header('Location: listarestaurante.php?id='.$idcidade);
   }
?>
