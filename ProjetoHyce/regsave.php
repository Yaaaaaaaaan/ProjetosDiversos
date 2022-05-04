<?php
/*include "";*/
include "connectview.php";
include"Frameworks/class.php";
session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
	$nick=htmlspecialchars($_POST["nick"]);
		$email=htmlspecialchars($_POST["email"]);
		$rank=htmlspecialchars($_POST["rank"]);
		$senha=htmlspecialchars($_POST["senha"]);
	    $hash =Bcrypt::hash($senha);
				$result=mysqli_query($link,"insert into colaborador (nick, senha, email, rank) values ('$nick', '$hash', '$email', '$rank')")or die (mysqli_error());
				if($result){
					header("Location:inicio.php");
					echo "Deu certo!!";
				}else {echo "Tem parada errada aí. RSRSRS";}

  }else{
 header('location:index.php'); // endereço do hyce nos arquivos.
  }
	
	
		

?>