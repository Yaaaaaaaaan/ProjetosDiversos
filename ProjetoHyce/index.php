<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="Frameworks/bootstrap.css">

    <title>HyceRp - PJ Login</title>
  
  </head>
  <body>
   

    <div class="container-fluid">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <form name="login" method="post" action="auth.php">
            <div class="form-group">
              <label for="nick">Nick</label>
                <input type="text" class="form-control" id="usuario" aria-describedby="usuarioHelp" placeholder="Insira o nome de usuario" name="nick">
            </div>
              <div class="form-group">
                <label for="senha">senha</label>
                  <input type="password" class="form-control" id="senha" placeholder="Insira a senha" name="senha">
              </div>
              <div class="form-group">
                <a class="nav-link" href="ers.php">Esqueceu sua senha?!</a>
              </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
