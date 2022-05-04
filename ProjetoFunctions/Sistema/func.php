<?php
	include "connectview.php";
	include "class.php";
			$user=htmlspecialchars($_POST["usuario"]);
			$senha=htmlspecialchars($_POST["senha"]);
			$nome=htmlspecialchars($_POST["nome"]);
			$nasc=htmlspecialchars($_POST["nascimento"]);
			$cpf=htmlspecialchars($_POST["cpf"]);
			$hash =Bcrypt::hash($senha);
			$rank=htmlspecialchars($_POST["rank"]);


auth($user,$senha);	
cad($nome,$nasc,$cpf,$hash,$rank,$user,$senha); 
 

		function auth($user,$senha){
			$sql="select * from operador where usuarioOp='$user'";
	  
			$resultado=mysqli_query($GLOBALS['link'],$sql);
			$fim=mysqli_fetch_array($resultado);
	  
			if($valor=Bcrypt::check($senha, $fim['senhaOp'])){
			    $_SESSION['id']=$fim['idOperat'];
			    $_SESSION['nick']=$fim['usuarioOp'];
			    $_SESSION['nome']=$fim['nomeOp'];
			    $_SESSION['rank']=$fim['rankOp'];
			    $_SESSION['nick']=md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
			    header('location:register.php');
			    }else { 
			    session_unset();
			    //header('location:index.php');
			  }
		}

		function cad($nome,$nasc,$cpf,$hash,$rank,$user,$senha){
	    	$result=mysqli_query($GLOBALS['link'],"insert into operador (usuarioOp, senhaOp, cpfOp, nomeOp, nascimentoOp, rankOp) values ('$user', '$hash', '$cpf', '$nome', '$nasc', '$rank' )")or die (mysqli_error());
				if($result){
					$_SESSION["nome"]=$nome;
					$_SESSION["usuario"]=$usuario;
					header("Location:../../html/online.php");
					echo "cad_ok";
				}else {echo "cad_erro";}
	    }
?>