<?php
 	session_start();
 	include "../DB/connect.php";
	include"../php/class.php";
 	if(isset($_SESSION['nick'])){
		$senha=htmlspecialchars($_POST["senha"]);
		$confsenha=htmlspecialchars($_POST["confsenha"]);
		$id_ope=$_SESSION['id'];
		if($senha==$confsenha){
			$hash=Bcrypt::hash($senha);
			$result=mysqli_query($link,"update operador SET senha='$hash' where id_ope='$id_ope'")or die (mysqli_error());
			if($result){
				header('location:../../Web/auth.php');
			}
		else{echo "";}
    	}
    	else{echo "";}
	}
	else{echo "";}
?>