<?php
include("conexao.php");
?>
<?php
  $idcidade = $_GET['id'];
   $sql =<<<EOF
      DELETE from urban.cidade where idcidade = $idcidade;
EOF;
   $ret = pg_query($db, $sql);
   $sql2 =<<<EOF
      DELETE from urban.hotspot where idcidade = $idcidade;
EOF;
 $ret2 = pg_query($db, $sql);
   if(!$ret2) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: lista.php');
   }
