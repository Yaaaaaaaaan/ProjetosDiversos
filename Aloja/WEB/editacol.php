<?php
	session_start();
	 include "../Sistema/DB/connectview.php";
  include"../Sistema/PHP/class.php";
	if(isset($_SESSION['nick'])){
	$id_col=$_POST['id'];
		 $slctCol="select * from colaborador where id_col='".$id_col."'";
   $rsltCol=mysqli_query($link,$slctCol);
	}else {
		header("location:../../web/index.php");
	}
 ?>

 <html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../Frameworks/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../Frameworks/css/Chart.css">
    <link href="../Frameworks/css/fontawesome.css" rel="stylesheet">
    <link href="../Frameworks/css/brands.css" rel="stylesheet">
    <link href="../Frameworks/css/solid.css" rel="stylesheet">


    <title></title>
  </head>
  <body>
     <script src="../Frameworks/js/bootstrap.js"></script>
     <script src="../Frameworks/js/fontawesome.js"></script>
     <script src="../Frameworks/js/brands.js"></script>
     <script src="../Frameworks/js/solid.js"></script>
<div class="container-fluid">
     <div class="row">
     	<div class="col-sm-10">
     			<form class="form" name="submit" method="POST" action="../sistema/php/updtcollab.php">
 					<?php
 						 while($exbCol = mysqli_fetch_array($rsltCol)){
 					?>
                  <div class="form-group row" style="padding-top: 5px;">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nome completo</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="nome" value="<?php echo $exbCol['nome']; ?>" name="nome">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nascimento</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" id="nascimento" value="<?php echo $exbCol['nascimento']; ?>" name="nascimento">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">CPF</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="CPF" value="<?php echo $exbCol['cpf']; ?>" name="cpf">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">CNPJ</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="CNPJ" value="<?php echo $exbCol['cnpj']; ?>" name="cnpj">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nome de Usuário</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="nick" value="<?php echo $exbCol['usuario']; ?>" name="nick">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="password1" value="<?php echo $exbCol['senha']; ?>" name="senha">
                    </div>
                  </div>
                    <div class="form-group row">                               
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Confirmar nova senha</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control" id="password2" value="<?php echo $exbCol['senha']; ?>" name="confsenha">
                      </div>
                    </div>
                <?php } ?>
                    <div class="form-group row">
                      <div class="col-sm-7"></div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-check"></i></button>
                    </div>
                    </div>
                </form>
              </div>
        </div>
    </div>

    <nav class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Construtec</font></font></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="true" aria-label="Alternar de navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse show" id="navbarColor02" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../Web/auth.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-home"></i> </font></font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../Web/ppl.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-users"></i></font></font></a>
        </li>
       <!-- <li class="nav-item">
          <a class="nav-link" href="../Web/fnc.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fornecedores</font></font></a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="../Web/rlt.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-box-open"></i></font></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Web/nby.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-shopping-basket"></i></font></font></a>
        </li>       
      </ul>
      <a class="navbar-brand ml-auto" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $_SESSION['nome'];?></font></font></a>
        <ul class="navbar-nav l-auto"> 
          <li class="nav-item">
          <a class="nav-link" href="../sistema/php/exit.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-power-off"></i></font></font></a>
          </li>
        </ul>
    </div>
  </nav>