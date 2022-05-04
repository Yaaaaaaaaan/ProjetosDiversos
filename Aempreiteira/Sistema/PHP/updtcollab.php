<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
	$id_col=$_POST['idcol'];
	$nome=$_POST['nomecol'];
	$usuario=$_POST['usuariocol'];
	$cpf=$_POST['cpfcol'];
	$cnpj=$_POST['cnpjcol'];
	$nasc=$_POST['nasccol'];

		 $result=mysqli_query($link,"update colaborador SET nome='$nome',usuario='$usuario',cpf='$cpf',cnpj='$cnpj',nascimento='$nasc' where id_col='$id_col'")or die (mysqli_error());
  	header("location:../../web/colaboradores.php");
	}else {
		header("location:../../web/index.php");
	}
 ?>
