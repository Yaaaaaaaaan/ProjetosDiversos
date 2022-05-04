<?php
	/*include "";*/
include "connectview.php";
include"Frameworks/class.php";
session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
  $cod_art=$_POST['codartstts'];
	$status=$_POST['status'];

		 $result=mysqli_query($link,"update article SET status='$status' where cod_art='$cod_art'")or die (mysqli_error());
  	if($result){
      header('location:inicio.php');
  	}else{}


  }else{
  header('location:index.php'); // endereço do hyce nos arquivos.
  }

	
	
	
		

 ?>
