<?php
include("conexao.php");
include("pegarcoluna.php");
?>
<?php
  $idcomentario = $_GET['id'];
  $idhotspot = pegarColuna("urban.comentario", "idhotspot", "idcomentario", $idcomentario);
   $sql =<<<EOF
      DELETE from urban.comentario where idcomentario = $idcomentario;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
      header('Location: listacomentario.php?id='.$idhotspot);
   }
