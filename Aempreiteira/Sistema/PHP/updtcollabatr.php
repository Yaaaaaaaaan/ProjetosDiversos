<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
	$cod_atr=$_POST['codattr'];
	$nivel=$_POST['nvlcoledit'];
	$atributo=$_POST['attrcoledit'];

		 $result=mysqli_query($link,"update atributos SET cod_atrib_fk='$atributo',cod_nvl_fk='$nivel' where cod_atr='$cod_atr'")or die (mysqli_error());
  	header("location:../../web/colaboradores.php");
	}else {
		header("location:../../web/index.php");
	}
 ?>
