<?php
 include "../DB/connectview.php";
  include"../PHP/class.php";
session_start();
session_unset();
header('location:../../Web/index.php');
?>