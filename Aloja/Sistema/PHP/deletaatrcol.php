<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
	$id_col=$_POST['id'];

	$dltCol=mysqli_query($link,"delete from atributos where cod_atr='".$id_col."' ");
	if($resultcol){
				header("location:../../web/colaboradores.php");
			}
			else{
				header("location:../../web/colaboradores.php");
			}
	}else {header("location:../../web/index.php");}



	?>