<?php
include("conexao.php");
include("pegarcoluna.php");
?>
<?php
  $idhotspot = $_GET['id'];
  $idcidade = pegarColuna("urban.hotspot", "idcidade", "idhotspot", $idhotspot);
   $sql =<<<EOF
      DELETE from urban.hotspot where idhotspot = $idhotspot;
EOF;
 $ret = pg_query($db, $sql);
 $sql2 =<<<EOF
    DELETE from urban.comentario where idhotspot = $idhotspot;
EOF;
$ret2 = pg_query($db, $sql2);

   if(!$ret2 && !$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: listahotspots.php?id='.$idcidade);
   }
