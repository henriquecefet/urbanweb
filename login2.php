<?php
  session_start();
   $host        = "host = ec2-3-222-183-44.compute-1.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = d5652rk5upj4qb";
   $credentials = "user = pdgjnondfgzvnr password=afb1574a2e12a2dee262b16e727cc67fee67cd8cdef5f40c01fb1f0f8faf791e";

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
     header('Location: login.php');
   }
   pg_close($db);
?>
