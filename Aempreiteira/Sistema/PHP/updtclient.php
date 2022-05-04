<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
	$id_cli=$_POST['idcli'];
	$nome=$_POST['nomecli'];
	$cpf=$_POST['cpfcli'];
	$cnpj=$_POST['cnpjcli'];
	$nasc=$_POST['nasccli'];

		 $result=mysqli_query($link,"update cliente SET nome='$nome',cpf='$cpf',cnpj='$cnpj',nascimento='$nasc' where id_cli='$id_cli'")or die (mysqli_error());
  	header("location:../../web/client.php");
	}else {
		header("location:../../web/index.php");
	}
 ?>
