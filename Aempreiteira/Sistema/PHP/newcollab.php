<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
	$nome=htmlspecialchars($_POST["nome"]);
	$nascimento=htmlspecialchars($_POST["nascimento"]);
	$nick=htmlspecialchars($_POST["nick"]);
	$cpf=htmlspecialchars($_POST["cpf"]);
	$cnpj=htmlspecialchars($_POST["cnpj"]);
	$senha=htmlspecialchars($_POST["senha"]);
	$confsenha=htmlspecialchars($_POST["confsenha"]);
	$atributos=($_POST["atributos"]);
	$nivel=($_POST["nivel"]);
    $hash =Bcrypt::hash($senha);

	if($senha==$confsenha){
		if(isset($cpf)){
			function limpaCPF_CNPJ($cpf){
	 			$cpf = trim($cpf);
	 			$cpf = str_replace(".", "", $cpf);
				 $cpf = str_replace(",", "", $cpf);
				 $cpf = str_replace("-", "", $cpf);
				 $cpf = str_replace("/", "", $cpf);
				 return $cpf;
			}
		$resultcol=mysqli_query($link,"
   INSERT INTO colaborador (usuario, senha, cpf, nome, nascimento) values ('$nick', '$hash', '$cpf', '$nome', '$nascimento' )")or die (mysqli_error());
		//criar um script´para add atributos.
   //INSERT INTO atributos (nome, nivel, id_col) VALUES ('$atributos', '$nivel', mysqli_insert_id(id_col));
			if($resultcol){
				header("location:../../web/colaboradores.php");
			}
			else{
				header("location:../../web/colaboradores.php");
			}
		}
			if(isset($cnpj)){
				function limpaCPF_CNPJ($cnpj){
	 				$cnpj = trim($cnpj);
	 				$cnpj = str_replace(".", "", $cnpj);
					$cnpj = str_replace(",", "", $cnpj);
					$cnpj = str_replace("-", "", $cnpj);
					$cnpj = str_replace("/", "", $cnpj);
	 				return $cnpj;
				}

				$resultcol=mysqli_query($link,"insert into colaborador (usuario, senha, cnpj, nome, nascimento) values ('$nick', '$hash', '$cnpj', '$nome', '$nascimento' )")or die (mysqli_error());
				if($resultcol){
					header("location:../../web/colaboradores.php");
				}
				else{
					header("location:../../web/colaboradores.php");
				}
			}
	
		
}else{echo"";}}else{header("location:../../web/index.php");}
?>