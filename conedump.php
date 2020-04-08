<?php
session_start();
if (!isset($_SESSION['conectado']))
{
  header('Location: login.php');
}

 ?>
<?php
$host        = "host = 127.0.0.1";
$port        = "port = 5435";
$dbname      = "dbname = urban";
$credentials = "user = postgres password=ursopanda";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      //echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }
  ?>
