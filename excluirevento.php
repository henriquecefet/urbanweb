<?php
include("verificarlogin.php");
include("conexao.php");
include("pegarcoluna.php");
?>
<?php
  $idevento = $_GET['id'];
  $idhotspot = pegarColuna("urban.evento", "idhotspot", "idevento", $idevento);
   $sql =<<<EOF
      DELETE from urban.evento where idevento = $idevento;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: listaevento.php?id='.  $idhotspot);
   }
