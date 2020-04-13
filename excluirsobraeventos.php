<?php
include("conexao.php");
 ?>
<?php
  $num = 0;
   $sql =<<<EOF
      SELECT * from urban.evento;
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
        echo pg_last_error($db);
    exit;
   }
   while($row = pg_fetch_row($ret)) {
            $sql2 =<<<EOF
               SELECT * from urban.hotspot where idhotspot = $row[3];
EOF;
            $ret2 = pg_query($db, $sql2);
            if(!$ret2) {
              echo pg_last_error($db);
              exit;
            }
            $podedeletar = true;
            while($row2 = pg_fetch_row($ret2)) {
              $podedeletar = false;
            }
            if($podedeletar){
              $sq3 =<<<EOF
                 DELETE from urban.evento where idevento = $row[0];
EOF;
              $num++;

            }


   }
   echo "eventos excluidos: ".  $num;
   pg_close($db);
?>
