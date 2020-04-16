<?php
include("conexao.php");
?>
<?php
  $idhotspot = $_GET['id'];
   $sql =<<<EOF
      DELETE from urban.hotspot where idhotspot = $idhotspot;
EOF;
 $ret = pg_query($db, $sql);
 $sql2 =<<<EOF
    DELETE from urban.comentario where idhotspot = $idhotspot;
EOF;
$ret2 = pg_query($db, $sql2);

   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: lista.php');
   }
