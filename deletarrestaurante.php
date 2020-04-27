<?php
include("conexao.php");
include("pegarcoluna.php");
?>
<?php
  $idrestaurante= $_GET['id'];
  $idcidade = pegarColuna("urban.restaurante", "idcidade", "idrestaurante", $idrestaurante);
   $sql =<<<EOF
      DELETE from urban.restaurante where idrestaurante =  $idrestaurante;
EOF;
 $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: lista.php?id='.$idcidade);
   }
