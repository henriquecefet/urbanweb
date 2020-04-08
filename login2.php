<?php
  session_start();
   $host        = "host = ec2-52-23-14-156.compute-1.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = de04qoln4k3dbd";
   $credentials = "user = qzijxcrgetwdyg password=c57cdc821172e503b8d71aebbb96cb5fc7d78adeb40f694720a128251e687c5b";

   $db = pg_connect( "$host $port $dbname $credentials");
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n". "<br>";
   }

   $senha= $_REQUEST["senha"];
   $nome = $_REQUEST["nome"];

   $sql =<<<EOF
      SELECT * from urban.usuario where login =  '$nome' and senha = '$senha';
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
        echo pg_last_error($db);
    exit;
   }
   $podeir = false;
   while($row = pg_fetch_row($ret)) {
     $podeir = true;
      header('Location: index.php');
      $_SESSION["conectado"] = true;
   }
   if(!$podeir){
     echo "Usuário ou senha incorretos\n". "<br>";
     //header('Location: login.php');
   }
   
   pg_close($db);
?>
