<?php
include("conexao.php");
 ?>
<?php
   $idevento = $_REQUEST["idevento"];
   $nome = $_REQUEST["nome"];
   $imagem = $_REQUEST["linkimagem"];
   $link= $_REQUEST["link"];
   $sql =<<<EOF
      UPDATE urban.evento set nome = '$nome', imagem = '$imagem', link =  '$link' where idevento= $idevento;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record updated successfully\n";
      header('Location: lista.php');
   }
?>
