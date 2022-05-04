<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
	$idClient=$_POST['id'];

	$dltcli=mysqli_query($link,"delete from cliente where idClient='".$idClient."' ");
	if($resultcli){
				header("location:../../web/ppl.php");
			}
			else{
				header("location:../../web/ppl.php");
			}
	}else {header("location:../../web/index.php");}



	?>