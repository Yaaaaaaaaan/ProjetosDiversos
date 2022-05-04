<?php
 
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
	$cod_atrib=htmlspecialchars($_POST["attrcol"]);
	$cod_nvl=htmlspecialchars($_POST["nvlcol"]);
	$id_col=htmlspecialchars($_POST["namecol"]);
		$resultcol=mysqli_query($link,"
   INSERT INTO atributos (cod_bat_atr, cod_nvl_atr, id_col_atr) values ('$cod_atrib', '$cod_nvl', '$id_col' )")or die (mysqli_error());
		
		if($resultcol){
				header("location:../../web/colaboradores.php");
			}
			else{
				
		}
	}else {
		header("location:../../web/index.php");
	}
 ?>