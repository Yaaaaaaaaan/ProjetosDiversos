<?php
include "connectview.php";
include"Frameworks/class.php";
session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
  	date_default_timezone_set('America/Sao_Paulo');
	$datacriacao=date('Y-m-d H:i');
   	$tittle=htmlspecialchars($_POST["titulo"]);
	$idus=htmlspecialchars($_POST["id_user"]);
	$conteudo=htmlspecialchars($_POST["corpo"]);
	$status=1;
			$result=mysqli_query($link,"insert into article (titulo, corpo, id_col_fk, datacriacao, status, dataedicao) values ('$tittle', '$conteudo', '$idus', '$datacriacao', '$status', '$datacriacao')")or die (mysqli_error());
			if($result){
				
				header("Location:inicio.php");

  }else{
 	header('location:index.php'); // endereço do hyce nos arquivos.
  }}
?>