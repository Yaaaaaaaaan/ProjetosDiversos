<?php
	session_start();
	include "../DB/connect.php";
	include"../php/class.php";
	if(isset($_SESSION['nick'])){
/*	$nome=htmlspecialchars($_POST["nome"]);
	$nascimento=htmlspecialchars($_POST["nascimento"]);
	$cpf=htmlspecialchars($_POST["cpf"]);
	$cnpj=htmlspecialchars($_POST["cnpj"]);
	$email=htmlspecialchars($_POST["email"]);
	$telefone=htmlspecialchars($_POST["telefone"]);
	$celular=htmlspecialchars($_POST["celular"]);*/
	$Reg=htmlspecialchars($_POST["regiao"]);
//	echo $nome." ".$nascimento." ".$cpf." ".$cep;
	
	/*	if(isset($cpf)){
			function limpaCPF_CNPJ($cpf){
	 			$cpf = trim($cpf);
	 			$cpf = str_replace(".", "", $cpf);
				 $cpf = str_replace(",", "", $cpf);
				 $cpf = str_replace("-", "", $cpf);
				 $cpf = str_replace("/", "", $cpf);
				 return $cpf;
			}
			$resultcol=mysqli_query($link," INSERT INTO cliente (nome, nascimento, cpf, email, telefone, celular) values ('$nome', '$nascimento', '$cpf', '$email', '$telefone', '$celular' )")or die (mysqli_error());
		//criar um script´para add atributos.
   /*INSERT INTO atributos (nome, nivel, id_col) VALUES ('$atributos', '$nivel', mysqli_insert_id(id_col));*/
	/*		if($resultcol){
				echo $nome." ".$nascimento." ".$cpf." ".$cep." ".$email." ".$telefone." ".$celular;
			}
			else{
				header("location:../../web/client.php");
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

				$resultcol=mysqli_query($link,"insert into cliente (nome, nascimento, cnpj, email, telefone, celular) values ('$nome', '$nascimento', '$cnpj', '$email', '$telefone', '$celular')")or die (mysqli_error());
				if($resultcol){
					echo"";
				}
				else{
					header("location:../../web/client.php");
				}
			}*/
	
	$slcBasEndEsta="select * from endsbr.estado where Regiao_e='$Reg'";
    $rsltBasEndEsta=mysqli_query($link,$slcBasEndEsta);
		
}else{header("location:../../web/index.php");}
?>

<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../Frameworks/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../Frameworks/css/Chart.css">
    <link href="../../Frameworks/css/fontawesome.css" rel="stylesheet">
    <link href="../../Frameworks/css/brands.css" rel="stylesheet">
    <link href="../../Frameworks/css/solid.css" rel="stylesheet">
     <title><?php echo $_SESSION['nome'];?> - CONSTRUTEC</title>
  </head>
  <body>
	<script src="../../Frameworks/js/bootstrap.js"></script>
    <script src="../../Frameworks/js/fontawesome.js"></script>
    <script src="../../Frameworks/js/brands.js"></script>
    <script src="../../Frameworks/js/solid.js"></script>
  
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-12">
  				 <hr style="border:solid 1px #B8C0CC;">
                     <div style="padding-top: 15px;">
                    <center><h4 class="card-title" style="color:#737880">Informações pessoais</h4></center>
                  </div>
                  <form class="form" name="submit" method="POST" action="../php/newclientest.php">
              	<div class="form-group">
            		<div class="row">              
            			<div class="col-4"><label for="cep" class="col-form-label">CEP: </label></div>
            			<div class="col-5"><label for="" class="col-form-label">Estado:</label></div>
          			</div>
            		<div class="row">
            			<div class="col-4"><input name="cep" type="text" class="form-control" id="cep"></div>
                    	<div class="col-5"><select name="estado" class="custom-select" id="inputGroupSelect01">
                          <option>Selecione...</option>
                            <?php            
                                     while($exbBasEndEsta = mysqli_fetch_array($rsltBasEndEsta)){
                                     ?>  
                                    <option value="<?php  echo $exbBasEndEsta['Uf_e'] ;?>">
                                      <?php echo $exbBasEndEsta['Nome_e'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select></div>
                    </div>
        		</div>
                   <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-check"></i></button>
                   </form>
       
      </div> 
      </div>
    </div>
  </div>

  
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>   
    <script src="../../Frameworks/js/bootstrap.js"></script>
</body>
</html>