<?php
  include "../Sistema/DB/connectview.php";
  include"../Sistema/PHP/class.php";
  session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
  $slcOs="select * from ordem_servico order by codigo desc";
  $rsltOs=mysqli_query($link,$slcOs);
  //criar um count com inner join p/ aparecer nome equantidade de registros do total de serviços semanal de cara colaborador.
  //$testeselect="select Vendedor.IdCanal, Count(Vendedor.IdCanal) total, CanalVenda.Nome FROM      Vendedor INNER JOIN CanalVenda On Vendedor.IdCanal=CanalVenda.Id GROUP BY Vendedor.IdCanal, CanalVenda.Nome";


// Teste data funciona, porém, dá um total de registros, não um número de repetições de um distinto registro.

  //$testedata= "SELECT YEAR(data) as ano, WEEK(data) as semana, SUM(id_colaborador=id_colaborador) as col_total FROM ordem_servico GROUP BY ano, semana";
 // $totaltestedata=mysqli_query($link,$testedata);
 // $exibetestedata=mysqli_fetch_array($totaltestedata);

// resolver problema do mysqli_fetch_array lá no while \/
  $slcCoS="select YEAR(O.data) as ano, WEEK(O.data) as semana, O.id_colaborador, count (O.id_colaborador) total, O.codigo, O.descricao, O.tipo, O.status, O.totalpago, C.id, C.nome, C.CPF, C.CNPJ from ordem_servico as O full join colaborador as C on O.id_colaborador = C.id GROUP BY O.id_colaborador";
 $rsltCoS=mysqli_query($link,$slcCoS);
  }else{
   session_unset();
     header('location:../Web/index.php');
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


    <title>Início - CONSTRUTEC</title>
  </head>
  <body>
     <script src="../Frameworks/js/bootstrap.js"></script>
     <script src="../Frameworks/js/fontawesome.js"></script>
     <script src="../Frameworks/js/brands.js"></script>
     <script src="../Frameworks/js/solid.js"></script>
      

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
         <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #E6F0FF;">
    <a class="navbar-brand" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $_SESSION['nome']; ?></font></font></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="true" aria-label="Alternar de navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse show" id="navbarColor02" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../Web/auth.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Página inicial </font></font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Web/client.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clientes</font></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Web/Colaboradores.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Colaboradores</font></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Web/Relatorios.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Relatórios</font></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Web/servicos.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Serviços</font></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sistema/php/exit.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sair</font></font></a>
        </li>
        
      </ul>
    </div>
  </nav>
          
        </div>
      </div>
                       
        <div class="row">
          <div class="col-12">

          <!--  TESTE DE DATA, SEMANA E TOTAL (SOMA VALORES NAS COLUNAS)

          <?php
            //echo $exibetestedata['ano']."<-Ano, Semana->".$exibetestedata['semana']." Col total: (colaboradores)".$exibetestedata['col_total'];
            ?> -->           
         
          </div>
        </div>
    <div class="row">
      <div class="col-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-people-carry"></i> Serviços</a>
          <a class="nav-link" id="v-pills-aprovCol-tab" data-toggle="pill" href="#v-pills-aprovCol" role="tab" aria-controls="v-pills-aprovCol" aria-selected="false"><i class="fas fa-chart-bar"></i> Colaboradores</a>
          <a class="nav-link" id="v-pills-help-tab" data-toggle="pill" href="#v-pills-help" role="tab" aria-controls="v-pills-help" aria-selected="false"><i class="fas fa-info-circle"></i> Ajuda</a>
          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"> <i class="fas fa-cogs"></i> Mudar senha</a>
        </div>
      </div>
    <div class="col-10">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <table class='table table-bordered'>
           <thead>
             
               <th scope="col">Cód</th>
               <th scope="col">Desc. serv.</th>
               <th scope="col">Tipo</th>
               <th scope="col">Status</th>
               <th scope="col">data</th>
               <th scope="col">Forma de Pagamento</th>
               <th scope="col">Parcelas</th>
            <!--   <th scope="col">Total a Pagar</th>
               <th scope="col">Total Pago</th>-->
             
           </thead>

              <tbody>
                <?php
                    while( $exbOs = mysqli_fetch_array($rsltOs)){
                      echo "<tr><td>".$exbOs['codigo']."</td>";
                      echo "<td>".$exbOs['descricao']."</td>";
                      echo "<td><p class='text-warning'>".$exbOs['tipo']."</p></td>";
                      echo "<td> <p class='text-success'>".$exbOs['status']."</p></td>";
                      echo "<td>".$exbOs['data']."</td>";
                      echo "<td><p class='text-danger'>".$exbOs['formapagamento']."</p></td>";
                      echo "<td>".$exbOs['parcelas']."</td>";
                      //echo "<td>".$exbOs['totalpagar']."</td>";
                      //echo "<td>".$exbOs['totalpago']."</td></tr>"; 
                    } 
                ?>
              </tbody>
          </table>
        </div>
          <div class="tab-pane fade" id="v-pills-aprovCol" role="tabpanel" aria-labelledby="v-pills-aprovCol-tab">
            <script src="../Frameworks/js/Chart.bundle.js"></script>
              <?php
                while( $exbCoS = mysqli_fetch_array($rsltCoS)){
                  echo $exbCos['C.nome']; }
                ?>
                  <canvas id="myChart" height=90></canvas>
                    <script>
                      var ctx = document.getElementById('myChart');
                      var myChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: [ "Juca","Mario","Lucas","Junior","antônio","carlos",'<?php echo $exbCoS["usuario"];?>'],
                              datasets: [{
                                  label: 'Total de serviços semana',
                                  data: [15,9,8,3,1,1,/*'<?php echo $psqOs["total"];?>',*/],
                                  backgroundColor: [
                                      'rgba(158, 228, 255, 0.5)',
                                      'rgba(158, 228, 255, 0.5)',
                                      'rgba(158, 228, 255, 0.5)',
                                      'rgba(158, 228, 255, 0.5)',
                                      'rgba(158, 228, 255, 0.5)',
                                      'rgba(158, 228, 255, 0.5)'
                                  ],
                                  borderColor: [
                                      'rgba(84, 114, 128, 0.5)',
                                      'rgba(84, 114, 128, 0.5)',
                                      'rgba(84, 114, 128, 0.5)',
                                      'rgba(84, 114, 128, 0.5)',
                                      'rgba(84, 114, 128, 0.5)',
                                      'rgba(84, 114, 128, 0.5)'
                                  ],
                                  borderWidth: 3
                              }]
                          },
                          options: {
                              scales: {
                                  yAxes: [{
                                      ticks: {
                                          beginAtZero: true
                                      }
                                  }]
                              }
                          }
                      });
                    </script>
              <?php 
                //} 
              ?>
          </div>
            <div class="tab-pane fade" id="v-pills-help" role="tabpanel" aria-labelledby="v-pills-help-tab">
              
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>



            </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">            
               <form class="form" name="submit" method="POST" action="../sistema/php/newpass.php">
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
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../Frameworks/js/bootstrap.js"></script>
  </body>
</html>

