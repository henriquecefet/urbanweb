<?php
include("conexao.php");
 ?>
<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $idcidade = $_REQUEST["idcidade"];
     $nome = $_REQUEST["nome"];
     $latitude = $_REQUEST["latitude"];
     $longitude = $_REQUEST["longitude"];
     $imagem = $_REQUEST["linkimagem"];
}

   $sql =<<<EOF
      INSERT INTO urban.cidade (idcidade ,nome ,latitude ,longitude ,imagem)
      VALUES ($idcidade, '$nome', $latitude, $longitude, '$imagem' );

EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
?>
