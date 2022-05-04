<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	$nome=htmlspecialchars($_POST["nome"]);
	$nascimento=htmlspecialchars($_POST["nascimento"]);
	$usuario=htmlspecialchars($_POST["usuario"]);
	$cpf=htmlspecialchars($_POST["cpf"]);
	$senha=htmlspecialchars($_POST["senha"]);
    $hash =Bcrypt::hash($senha);
    $rank=5;
	//echo "Essa é a senha;".$nome.$nascimento.$usuario.$cpf.$hash;
			$result=mysqli_query($link,"insert into operador (usuario, senha, cpf, nome, nascimento, rank) values ('$usuario', '$hash', '$cpf', '$nome', '$nascimento', '$rank' )")or die (mysqli_error());
			if($result){
				$_SESSION["nome"]=$nome;
				$_SESSION["usuario"]=$usuario;
				//header("Location:../../html/online.php");
				echo "Deu certo!!";
			}else {echo "Tem parada errada aí. RSRSRS";}
		

?>