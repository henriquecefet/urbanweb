<?php
include("verificarlogin.php");
include("conexao.php");
 ?>
<?php
   $idhotspot = $_REQUEST["idhotspot"];
   $nome = $_REQUEST["nome"];
   $latitude = $_REQUEST["latitude"];
   $longitude = $_REQUEST["longitude"];
   $imagem = $_REQUEST["linkimagem"];
   $site = $_REQUEST["site"];
   $idcidade = $_REQUEST["idcidade"];
   $arlivre = $_REQUEST["arlivre"];
   if(!isset($arlivre)||$arlivre==null){
      $arlivre = f;
   }
   else{
      $arlivre = t;
   }
   $sql =<<<EOF
      UPDATE urban.hotspot set nome = '$nome', latitude = $latitude, longitude = $longitude, imagem = '$imagem', linksite =  '$site', 'ar-livre' = $arlivre where idhotspot= $idhotspot;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record updated successfully\n";
      header('Location: listahotspots.php?id='.$idcidade);
   }
?>
