 <?php
/*include "";*/
include "connectview.php";
include"Frameworks/class.php";
session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){


  }else{
 header('location:index.php'); // endereço do hyce nos arquivos.
  }

?>

<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="frameworks/bootstrap.css">
    <link href="frameworks/fontawesome.css" rel="stylesheet">
      <link href="frameworks/brands.css" rel="stylesheet">
  <link href="frameworks/solid.css" rel="stylesheet">
    <title>PJ - HyceRP</title>
  </head>
  <body>
           <script src="frameworks/bootstrap.js"></script>
           <script src="frameworks/fontawesome.js"></script>
           <script src="frameworks/brands.js"></script>
           <script src="frameworks/solid.js"></script>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#"><font style="vertical-align: inherit;"><?php echo $_SESSION['nick']; ?> - Painel Jornalístico</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="inicio.php"><i class="fas fa-archive"></i> Inicial</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pluss.php"><i class="fas fa-newspaper"></i> Novo artigo</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="newpass.php"><i class="fas fa-tools"></i> Mudar senha</a>
                  </li>
                   <?php if($_SESSION['rank']==3){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="register.php"><i class="fas fa-hard-hat"></i> Novo Usuário</a>
                  </li>';
                  }
                  ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>


        <div class="row">
          <div class="col-12">


  <form class="form" name="submit" method="POST" action="savepass.php">
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nova senha</label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="password1" placeholder="Insira sua senha." name="senha">
                    </div>
                  </div>
                    <div class="form-group row">                               
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Confirmar nova senha</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control" id="password2" placeholder="Necessário ser idêntica a anterior." name="confsenha">
                      </div>
                    </div>
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