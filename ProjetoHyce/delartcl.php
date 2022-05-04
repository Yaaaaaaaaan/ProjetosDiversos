<?php
	session_start();
	include "connectview.php";
	include"Frameworks/class.php";
	if(isset($_SESSION['nick'])){
	$cod_art=$_POST['cod_art'];

	$dltCol=mysqli_query($link,"delete from article where cod_art='".$cod_art."' ");
	if($resultcol){
				header("location:inicio.php");
			}
			else{
				header("location:inicio.php");
			}
	}else {header("location:index.php");}



	?>