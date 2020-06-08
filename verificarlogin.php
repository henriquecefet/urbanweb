<?php
session_start();
if (!isset($_SESSION['conectado']))
{
  header('Location: login.php');
}
 ?>
