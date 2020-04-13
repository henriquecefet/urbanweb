<?php
include("conexao.php");
?>
<?php
  $idrestaurante= $_GET['id'];
   $sql =<<<EOF
      DELETE from urban.restaurante where idrestaurante = $  $idrestaurante;
EOF;
 $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: lista.php');
   }
