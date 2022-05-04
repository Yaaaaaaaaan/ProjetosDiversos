<?php
 include "../DB/connectview.php";
  include"../PHP/class.php";
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
  session_unset();
session_destroy();
header('location:../../Web/index.php');
}else{
session_unset();
session_destroy();
header('location:../../Web/index.php');
}


?>