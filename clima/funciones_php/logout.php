<?php
  session_start();
  session_destroy();
  $url =  'http://'.$_SERVER['SERVER_NAME'].'/clima/login.php';
  header('location:'.$url);
?>
