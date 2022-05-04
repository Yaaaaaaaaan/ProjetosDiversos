<?php
/*include "";*/
include "connectview.php";
include"Frameworks/class.php";
session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
   $slcOs="select * from article as a join colaborador as c on c.id_col = a.id_col_fk"; // Por hora, versão atual.
 
  // $slcOs="SELECt * FROM colaboracao as c JOIN article as a ON a.cod_art = c.cod_art_fk JOIN colaborador as d ON d.id_col = c.id_col_fk"; // Funciona, para próximas versões.

    $rsltOs=mysqli_query($link,$slcOs);


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
                  <li class="nav-item active">
                    <a class="nav-link" href="inicio.php"><i class="fas fa-archive"></i> Inicial</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pluss.php"><i class="fas fa-newspaper"></i> Novo artigo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="newpass.php"><i class="fas fa-tools"></i> Mudar senha</a>
                  </li>
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
               <table class='table table-bordered' >
                <thead>
                  <th scope="col">Cod artigo</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Corpo</th>
                  <th scope="col">Status</th>
                  <th scope="col">Data criação</th>
                  <th scope="col">Data alteração</th><th scope="col">Nick</th>
                  <?php  
                    switch($_SESSION["rank"]){
                      case 3:
                     echo '<th scope="col">Ações</th>';
                     break;
                     case 2:
                     echo '<th scope="col">Ações</th>';
                     break;
                     case 1:
                      echo '<th scope="col">Ações</th>';
                     break;}
                  ?>
                  <?php
                    while( $exbArtcl = mysqli_fetch_array($rsltOs)){
                      echo "<tr><td>".$exbArtcl['cod_art']."</td>";
                      echo "<td>".$exbArtcl['titulo']."</td>";
                      echo "<td>".$exbArtcl['corpo']."</td>";                      
                        switch($exbArtcl['status']){
                          case 3:
                          echo "<td> Autorizado, Parabéns! Será publicado em breve.</td>";
                          break;
                          case 2:
                          echo "<td> Recusado, favor faça correções e/ou atualizações, para que em breve possamos analizar novamente!</td>";
                          break;
                          case 1:
                          echo "<td> Em análise, Breve analizaremos esta publicação.</td>";
                          break;
                        }
                      echo "<td>".$exbArtcl['datacriacao']."</td>";
                      echo "<td>".$exbArtcl['dataedicao']."</td>";
                      echo "<td>".$exbArtcl['nick']."</td>";
                      switch($_SESSION["rank"]){
                      case 3 :
                      echo "<td>"."<center><button type='button submit' class='btn btn-danger btn-lg btn-block' data-toggle='modal' data-target='#excluirtcl' data-codartdel='".$exbArtcl["cod_art"]."' data-excluiratcl='".$exbArtcl['titulo']."' ><i class='fas fa-trash'></i></button>";
                       echo  "<button type='button submit' class='btn btn-warning btn-lg btn-block' data-toggle='modal' data-target='#editartcl' data-codart='".$exbArtcl["cod_art"]."' data-tittleart='".$exbArtcl['titulo']."' data-bodyart='".$exbArtcl['corpo']."' data-nick='".$exbArtcl['nick']."' data-dataedit='".$exbArtcl['dataedicao']."' data-create='".$exbArtcl['datacriacao']."'> <i class='fas fa-pen-alt'></i></button>";
                       echo "<button type='button submit' class='btn btn-success btn-lg btn-block' data-toggle='modal' data-target='#adminsts' data-admincod='".$exbArtcl["cod_art"]."' data-restatus='".$exbArtcl['status']."'><i class='fas fa-lightbulb'></i></button>"."</center></td>";

                       break;
                       case 2:
                       if($exbArtcl['id_col_fk']== $_SESSION['id']){
                        echo "<td>".""."<center><button type='button submit' class='btn btn-danger btn-lg btn-block' data-toggle='modal' data-target='#excluirtcl' data-codartdel='".$exbArtcl["cod_art"]."' data-excluiratcl='".$exbArtcl['titulo']."'><i class='fas fa-trash'></i></button>"."<br>";
                       }else{echo "<td><center>";}
                       echo  "<button type='button submit' class='btn btn-warning btn-lg btn-block' data-toggle='modal' data-target='#editartcl' data-codart='".$exbArtcl["cod_art"]."' data-tittleart='".$exbArtcl['titulo']."' data-bodyart='".$exbArtcl['corpo']."' data-nick='".$exbArtcl['nick']."' data-dataedit='".$exbArtcl['dataedicao']."' data-create='".$exbArtcl['datacriacao']."'> <i class='fas fa-pen-alt'></i></button></center>"."</td>";
                       break;
                       case 1:
                       if($exbArtcl['id_col_fk']==$_SESSION['id']){
                      echo  "<td>"."<center><button type='button submit' class='btn btn-danger btn-lg btn-block' data-toggle='modal' data-target='#excluirtcl' data-codartdel='".$exbArtcl["cod_art"]."' data-excluiratcl='".$exbArtcl['titulo']."'><i class='fas fa-trash'></i></button>"."<br>"."<button type='button submit' class='btn btn-warning btn-lg btn-block' data-toggle='modal' data-target='#editartcl' data-codart='".$exbArtcl["cod_art"]."' data-tittleart='".$exbArtcl['titulo']."' data-bodyart='".$exbArtcl['corpo']."' data-nick='".$exbArtcl['nick']."' data-dataedit='".$exbArtcl['dataedicao']."'><i class='fas fa-pen-alt'></i></button></center>"."</td>";
                       }else{}
                      
                       break;
                   }
                    }
                     
                  ?>
                </thead>
              </table>
            </div>
          </div>
            <div class="modal fade" id="editartcl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form" name="submit" method="POST" action="updtartcl.php">
                       <input name="codart" type="hidden" class="form-control" id="codart-name">
                      <div class="form-group">
                        <label for="tittleart-name" class="col-form-label">Título:</label>
                        <input name="titulo" type="text" class="form-control" id="tittleart-name">
                      </div>
                      <div class="form-group">
                        <label for="bodyart-name" class="col-form-label">Conteúdo:</label>
                        <textarea name="corpo" rows="4" cols="50" class="form-control" id="bodyart-name"></textarea>
                      </div>
                        <input name="nick" type="hidden" class="form-control" id="nick-name">
                      <div class="form-group">
                        <input type="hidden" name="dataedicao" value="<?php echo date('d m Y H:i:s A e'); ?>" class="form-control" id="dataedit-name">
                      </div>
                     <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button submit" class="btn btn-success">Alterar</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="excluirtcl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                     <h6 class="modal-title" id="exampleModalLabel"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <style type="text/css">
                      #excluiratcl-name{
                        background-color:transparent;
                        border:none;
                         box-shadow: 0 0 0 0;
                        border: 0 none;
                        outline:0;
                        margin:0;
                        width:auto;
                      }
                      #restatus-name{
                         background-color:transparent;
                        border:none;
                         box-shadow: 0 0 0 0;
                        border: 0 none;
                        outline:0;
                        margin:0;
                        width:auto;
                      }
                    </style>
                    <p>Tem certeza que deseja excluir <input id="excluiratcl-name" readonly="readonly"></input> ?</p>
                  </div>
                  <div class="modal-footer">
                     <form class="form" name="submit" method="POST" action="delartcl.php">
                      <input type="hidden" name="cod_art" id="codartdel-name">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button type="button submit" class="btn btn-success">Sim</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="adminsts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form" name="submit" method="POST" action="upstatus.php">
                       <input name="codartstts" type="hidden" class="form-control" id="admincod-name">
                         <select name="status" class="custom-select" id="inputGroupSelect01">
                          <option class="teste"><span>&times;</span></option>
                           <option value="3">Autorizado</option>
                           <option value="2">Negado</option>
                           <option value="1">Analisando</option>
                        </select>
                        <input name="nick" type="hidden" class="form-control" id="nick-name">
                      <div class="form-group">
                        <input type="hidden" name="dataedicao" value="<?php echo date('d m Y H:i:s A e'); ?>" class="form-control" id="dataedit-name">
                      </div>
                     <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button submit" class="btn btn-success">Alterar</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
      </div>
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="frameworks/bootstrap.js"></script>
    <script type="text/javascript">
      $('#editartcl').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var editartcl = button.data('editartcl')
        var codart = button.data('codart')
        var tittleart = button.data('tittleart')
        var bodyart = button.data('bodyart')
        var nick = button.data('nick')
        var dataedit = button.data('dataedit')
        var status = button.data('status') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Editar artigo')
        modal.find('#codart-name').val(codart)
        modal.find('#tittleart-name').val(tittleart)
        modal.find('#bodyart-name').val(bodyart)
        modal.find('#nick-name').val(nick)
        modal.find('#dataedit-name').val(dataedit)
        modal.find('#status-name').val(status)
      })

       $('#excluirtcl').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var excluirtcl = button.data('excluirtcl')
        var excluiratcl = button.data('excluiratcl')
        var codartdel = button.data('codartdel')
         // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Excluir artigo?')
        modal.find('#excluiratcl-name').val(excluiratcl)
        modal.find('#codartdel-name').val(codartdel)
        
      })

       $('#adminsts').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var adminsts = button.data('adminsts')
        var restatus = button.data('restatus')
        var admincod = button.data('admincod')
         // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Status')
        modal.find('.teste').text(restatus)
        modal.find('#restatus-name').val(restatus)
        modal.find('#admincod-name').val(admincod)
      })
    </script>
  </body>
</html>