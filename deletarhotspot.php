<?php
include("conexao.php");
?>
<?php
  $idhotspot = $_GET['id'];
   $sql =<<<EOF
      DELETE from urban.hotspot where idhotspot = $idhotspot;
EOF;
 $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: lista.php');
   }