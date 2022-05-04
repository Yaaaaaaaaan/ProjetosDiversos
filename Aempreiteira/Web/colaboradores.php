<?php
  include "../Sistema/DB/connectview.php";
  include"../Sistema/PHP/class.php";
  session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
 if(isset($_SESSION['nick'])){
    $slcOs="select * from colaborador order by id_col desc";
    $rsltOs=mysqli_query($link,$slcOs);
    $slcBasAtr="select * from base_atributos";
    $rsltBasAtr = mysqli_query($link,$slcBasAtr);
     $slcBasAtredit="select * from base_atributos";
    $rsltBasAtredit = mysqli_query($link,$slcBasAtredit);
    $slcBasNvl="select * from base_nivel";
    $rsltBasNvl = mysqli_query($link,$slcBasNvl);
    $slcBasNvledit="select * from base_nivel";
    $rsltBasNvledit = mysqli_query($link,$slcBasNvledit);
    $slcColAtr="select id_col,nome,usuario from colaborador order by nome";
    $rsltColAtr=mysqli_query($link,$slcColAtr);
  // Para quinta: terminar de editar a slcOs para editar o script com valores corretos. 
  // Para sexta: Descobrir o motivo do erro no full join e count.
  //$slcOs="select * from colaborador order by nome desc limit 6";
 // $slcOs="select O.id_colaborador, count (O.id_colaborador) total, O.codigo, O.descricao, O.tipo, O.status, O.data, O.totalpago, C.id, C.nome, C.CPF, C.CNPJ from ordem_servico as O full join colaborador as C on O.id_colaborador = C.id ";
 // $rsltOs=mysqli_query($link,$slcOs);
 // $psqOs=mysqli_fetch_array($rsltOs);
 // $psqOs=$rsltOs;
  // funcionou, falta só criar o gráfico  $slcCoS="select YEAR(O.data) as ano, WEEK(O.data) as semana, O.id_colaborador, count (O.id_colaborador) total, O.codigo, O.descricao, O.tipo, O.status, O.totalpago, C.id, C.nome, C.CPF, C.CNPJ from ordem_servico as O full join colaborador as C on O.id_colaborador = C.id GROUP BY O.id_colaborador";
 //$rsltCoS=mysqli_query($link,$slcCoS);
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
    <link rel="stylesheet" type="text/css" href="../Frameworks/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../Frameworks/css/Chart.css">
    <link href="../Frameworks/css/fontawesome.css" rel="stylesheet">
    <link href="../Frameworks/css/brands.css" rel="stylesheet">
    <link href="../Frameworks/css/solid.css" rel="stylesheet">
    <title>Colaboradores - CONSTRUTEC</title>
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
        <li class="nav-item">
          <a class="nav-link" href="../Web/auth.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Página inicial</font></font></a>
        </li> 
         <li class="nav-item ">
          <a class="nav-link" href="../Web/client.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clientes</font></font></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../Web/Colaboradores.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Colaboradores</font></font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="../Web/relatorios.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Relatórios</font></font></a>
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
                </div>
              </div>
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-vgeral-tab"  data-toggle="pill" href="#v-pills-vgeral" role="tab" aria-controls="v-pills-vgeral" aria-selected="true"><i class="fas fa-chart-bar"></i> Visão geral</a>
                  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-id-card-alt"></i> Perfis</a>
                  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-newspaper"></i> Anotações</a>
                  <a class="nav-link" id="v-pills-atributos-tab" data-toggle="pill" href="#v-pills-atributos" role="tab" aria-controls="v-pills-atributos" aria-selected="false"><i class="fas fa-tools"></i> Atributos</a>
                </div>
              </div>
              <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-vgeral" role="tabpanel" aria-labelledby="v-pills-vgeral-tab">
                      <!-- Digitar dados aqui--> 
                          <div class="col-12">
                            <script src="../Frameworks/js/Chart.bundle.js"></script>
                              <?PHP
                              //  while( $exbCoS = mysqli_fetch_array($rsltCoS)){
                             //   echo $exbCos['C.nome']; 
                              ?>
                                <canvas id="myChart" height=150></canvas>
                                <script>
                                  var ctx = document.getElementById('myChart');
                                  var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: [ "Juca","Mario","Lucas","Junior","antônio","carlos",//'<?php //echo $exbCoS["usuario"];?>'
                                      ],
                                        datasets: [{
                                          label: 'Índice de Conclusão de Serviços',
                                          data: [15,9,8,3,1,1,/*'<?php //echo $psqOs["total"];?>',*/],
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
                              <?php// } ?>
                          </div>
                <!-- Fim dos dados da primeira página--> 
                  </div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <!-- Digitar dados aqui-->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="aaa-tab" data-toggle="tab" href="#aaa" role="tab" aria-controls="aaa" aria-selected="false">Acrescentar</a>
  </li>
   <li class="nav-item">
    <a class="nav-link active" id="bbb-tab" data-toggle="tab" href="#bbb" role="tab" aria-controls="bbb" aria-selected="true">Exibir</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="bbb" role="tabpanel" aria-labelledby="bbb-tab">
    <div class="col-12" style="padding-top: 5px;">
      <table class='table table-bordered' >
        <thead>
         <th scope="col">Id</th>
         <th scope="col">Nome</th>
         <th scope="col">usuário</th>
         <th scope="col">CPF</th>
         <th scope="col">CNPJ</th>
         <th scope="col">Data de nascimento</th>
          <?php  
            switch($_SESSION["rank"]){
               case 5:
               echo '<th scope="col">Ações</th>';
               break;
                 case 4:
                 echo '<th scope="col">Ações</th>';
                 break;
                   case 3:
                   echo '<th scope="col">Ações</th>';
                   break;
                     case 2:
                     echo '<th scope="col">Ações</th>';
                     break;
                       case 1:
                       break;
            }
          ?> 
        </thead>
          <tbody>        
            <?php
              while( $exbColAtrIn = mysqli_fetch_array($rsltOs)){
                  echo "<tr><td>".$exbColAtrIn['id_col']."</td>";
                  echo "<td>".$exbColAtrIn['nome']."</td>";
                  echo "<td>".$exbColAtrIn['usuario']."</td>";
                  echo "<td> ".$exbColAtrIn['cpf']."</td>";
                  echo "<td>".$exbColAtrIn['cnpj']."</td>";
                  echo "<td>".$exbColAtrIn['nascimento']."</td>"; 
                    switch($_SESSION["rank"]){
                      case 5:
                       echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbColAtrIn["id_col"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrIn["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcol' data-idcol='".$exbColAtrIn["id_col"]."' data-nomecol='".$exbColAtrIn['nome']."' data-usuariocol='".$exbColAtrIn['usuario']."' data-cpfcol='".$exbColAtrIn['cpf']."' data-cnpjcol='".$exbColAtrIn['cnpj']."' data-nasccol='".$exbColAtrIn['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                         case 4:
                         echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbColAtrIn["id_col"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrIn["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcol' data-idcol='".$exbColAtrIn["id_col"]."' data-nomecol='".$exbColAtrIn['nome']."' data-usuariocol='".$exbColAtrIn['usuario']."' data-cpfcol='".$exbColAtrIn['cpf']."' data-cnpjcol='".$exbColAtrIn['cnpj']."' data-nasccol='".$exbColAtrIn['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                           case 3:
                           echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbColAtrIn["id_col"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrIn["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcol' data-idcol='".$exbColAtrIn["id_col"]."' data-nomecol='".$exbColAtrIn['nome']."' data-usuariocol='".$exbColAtrIn['usuario']."' data-cpfcol='".$exbColAtrIn['cpf']."' data-cnpjcol='".$exbColAtrIn['cnpj']."' data-nasccol='".$exbColAtrIn['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                           break;
                             case 2:
                             echo "<td>"."<center><button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcol' data-idcol='".$exbColAtrIn["id_col"]."' data-nomecol='".$exbColAtrIn['nome']."' data-usuariocol='".$exbColAtrIn['usuario']."' data-cpfcol='".$exbColAtrIn['cpf']."' data-cnpjcol='".$exbColAtrIn['cnpj']."' data-nasccol='".$exbColAtrIn['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                             break;
                               case 1:
                               break;
                    }
                    }
            ?>
          </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="aaa" role="tabpanel" aria-labelledby="aaa-tab">
    <form class="form" name="submit" method="POST" action="../sistema/php/newcollab.php">
                  <div class="form-group row" style="padding-top: 5px;">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nome completo</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="nome" placeholder="Ex: João Augusto Silva Ferreira" name="nome">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nascimento</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" id="nascimento"  name="nascimento">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">CPF</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="CPF" placeholder="Insira somente números. Ex: 12345678990" name="cpf">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">CNPJ</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="CNPJ" placeholder="Insira somente números. Ex: 12345678901229" name="cnpj">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nome de Usuário</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="nick" placeholder="Não permitido acentuação e espaçamento entre as palavras. Ex: JoaoA1" name="nick">
                    </div>
                  </div>
                  <div class="form-group row">                               
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="password1" placeholder="Insira sua senha. Máximo dez caracteres." name="senha">
                    </div>
                  </div>
                    <div class="form-group row">                               
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Confirmar nova senha</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control" id="password2" placeholder="Necessário ser idêntica a inserida anteriormente." name="confsenha">
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
          <!-- Fim dos dados da segunda página-->
  </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <!-- Digitar dados aqui-->
        ...
          <!-- Fim dos dados da terceira-->
      </div>
        <div class="tab-pane fade" id="v-pills-atributos" role="tabpanel" aria-labelledby="v-pills-atributos-tab">
        <!-- Digitar dados aqui-->
          <div class="col-12"> 
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link " id="acrescattr-tab" data-toggle="tab" href="#acrescattr" role="tab" aria-controls="acrescattr" aria-selected="false">Acrescentar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="showattr-tab" data-toggle="tab" href="#showattr" role="tab" aria-controls="showattr" aria-selected="false">Exibir</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="acrescattr" role="tabpanel" aria-labelledby="acrescattr-tab">
  <form class="form" name="submit" method="POST" action="../sistema/php/newattrib.php">
              <div class="form-group row" style="padding-top: 5px;">              
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Colaborador</label>
                      <div class="col-sm-7">
                        <select name="namecol" class="custom-select" id="inputGroupSelect02">
                          <option>Nome - Usuário</option>
                            <?php            
                                     while($exbColAtr = mysqli_fetch_array($rsltColAtr)){
                                     ?>  
                                    <option value="<?php  echo $exbColAtr['id_col'] ;?>">
                                      <?php echo $exbColAtr['nome'] ;?> - 
                                      <?php echo $exbColAtr['usuario'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select>
                      </div>
                      </div>
           <div class="form-group row">                               
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Principal atributo</label>
                      <div class="col-sm-7">
                         <select name="attrcol" class="custom-select" id="inputGroupSelect01">
                          <option>Classe</option>
                            <?php            
                                     while($exbBasAtr = mysqli_fetch_array($rsltBasAtr)){
                                     ?>  
                                    <option value="<?php  echo $exbBasAtr['cod_bat'] ;?>">
                                      <?php echo $exbBasAtr['atributo'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select>
                      </div>
                      </div>
                       <div class="form-group row">                               
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Nível</label>
                      <div class="col-sm-7">
                        <select name="nvlcol" class="custom-select" id="inputGroupSelect01">
                          <option>Especialização</option>
                            <?php            
                                     while($exbBasNvl = mysqli_fetch_array($rsltBasNvl)){
                                     ?>  
                                    <option value="<?php  echo $exbBasNvl['cod_nvl'] ;?>">
                                      <?php echo $exbBasNvl['nivel'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select>
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
  <div class="tab-pane fade show active" id="showattr" role="tabpanel" aria-labelledby="showattr-tab">
<div class="col-12" style="padding-top: 5px;">
      <table class='table table-bordered' >
        <thead>
         <th scope="col">Id</th>
         <th scope="col">Nome</th>
         <th scope="col">CPF/CNPJ</th>
         <th scope="col">Classe</th>
         <th scope="col">Especialização</th>
          <?php  
            switch($_SESSION["rank"]){
               case 5:
               echo '<th scope="col">Ações</th>';
               break;
                 case 4:
                 echo '<th scope="col">Ações</th>';
                 break;
                   case 3:
                   echo '<th scope="col">Ações</th>';
                   break;
                     case 2:
                     echo '<th scope="col">Ações</th>';
                     break;
                       case 1:
                       break;
            }
          ?>    
        </thead>
          <tbody>        
            <?php
            $slcColAtrNvl="select * from atributos a join colaborador b on a.id_col_atr = b.id_col join base_atributos c on a.cod_bat_atr = c.cod_bat join base_nivel d on a.cod_nvl_atr=d.cod_nvl";

// atributos tem que aparecer o id do usuário, nome do usuário, cpf do usuário, (consulta em atributos e base_atributos, para título do atributo) e (consulta ematributos e base_nivel para nível do atríbuto)

$rsltColAtrNvl=mysqli_query($link,$slcColAtrNvl);
              while( $exbColAtrNvl = mysqli_fetch_array($rsltColAtrNvl)){
                  echo "<tr><td>".$exbColAtrNvl['id_col']."</td>";
                  echo "<td>".$exbColAtrNvl['nome']."</td>";
                  echo "<td> ".$exbColAtrNvl['cpf']." / ".$exbColAtrNvl['cnpj']."</td>";
                  echo "<td>".$exbColAtrNvl['atributo']."</td>";
                  echo "<td>".$exbColAtrNvl['nivel']."</td>"; 
                    switch($_SESSION["rank"]){
                      case 5:
                      echo "<td>"."<center><form method='post' action='../sistema/php/deletaatrcol.php'> 
                      <input type='hidden' name='id' value='".$exbColAtrNvl["cod_atr"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrNvl["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editattr' data-codattr='".$exbColAtrNvl["cod_atr"]."'data-codatrb='".$exbColAtrNvl["atributo"]."' data-codnvl='".$exbColAtrNvl['nivel']."' data-idcolatr='".$exbColAtrNvl['nome']."' data-cpfcolatr='".$exbColAtrNvl['cpf']."' data-cnpjcolatr='".$exbColAtrNvl['cnpj']."' data-nasccol='".$exbColAtrNvl['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                         case 4:
                           echo "<td>"."<center><form method='post' action='../sistema/php/deletaatrcol.php'> 
                      <input type='hidden' name='id' value='".$exbColAtrNvl["cod_atr"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrNvl["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editattr' data-idcol='".$exbColAtrNvl["id_col"]."' data-nomecol='".$exbColAtrNvl['nome']."' data-usuariocol='".$exbColAtrNvl['usuario']."' data-cpfcol='".$exbColAtrNvl['cpf']."' data-cnpjcol='".$exbColAtrNvl['cnpj']."' data-nasccol='".$exbColAtrNvl['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                           case 3:
                             echo "<td>"."<center><form method='post' action='../sistema/php/deletaatrcol.php'> 
                      <input type='hidden' name='id' value='".$exbColAtrNvl["cod_atr"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrNvl["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editattr' data-idcol='".$exbColAtrNvl["id_col"]."' data-nomecol='".$exbColAtrNvl['nome']."' data-usuariocol='".$exbColAtrNvl['usuario']."' data-cpfcol='".$exbColAtrNvl['cpf']."' data-cnpjcol='".$exbColAtrNvl['cnpj']."' data-nasccol='".$exbColAtrNvl['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                           break;
                             case 2:
                              echo "<td>"."<center><button type='button' class='btn btn-success' name='".$exbColAtrNvl['id_col']."'><i class='fas fa-pen-square'></i></button></center>"."</td>";
                             break;
                               case 1:
                               break;
                    }

                    }
            ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
          <!-- Fim dos dados da quarta-->
      </div>
    </div>
   <!-- <tr><td>'.$exbCol["id_col"].'</td>
                                  <td><input type="text" class="form-control" id="nome" value="'.$exbCol["nome"].'" name="nome"></td>
                                  <td><input type="text" class="form-control" id="nick" value="'.$exbCol['usuario'].'" name="nick"></td>
                                  <td><input type="text" class="form-control" id="CPF" value="'.$exbCol['cpf'].'"name="cpf"></td>
                                  <td><input type="date" class="form-control" id="nascimento" value="'.$exbCol['nascimento'].'" name="nascimento"></td>-->
  </div>
</div>
          </div>
        </div>
    </div>
  <div class="modal fade" id="editcol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" name="submit" method="POST" action="../sistema/php/updtcollab.php">
           <input name="idcol" type="hidden" class="form-control" id="idcol-name">
          <div class="form-group">
            <label for="nomecol-name" class="col-form-label">Nome:</label>
            <input name="nomecol" type="text" class="form-control" id="nomecol-name">
          </div>
          <div class="form-group">
            <label for="usuariocol-name" class="col-form-label">Nick:</label>
            <input name="usuariocol" type="text" class="form-control" id="usuariocol-name">
          </div>
          <div class="form-group">
            <label for="cpfcol-name" class="col-form-label">CPF:</label>
            <input name="cpfcol" type="text" class="form-control" id="cpfcol-name">
          </div>
          <div class="form-group">
            <label for="cnpjcol-name" class="col-form-label">CNPJ:</label>
            <input name="cnpjcol" type="text" class="form-control" id="cnpjcol-name">
          </div>
          <div class="form-group">
            <label for="nasccol-name" class="col-form-label">Nascimento:</label>
            <input name="nasccol" type="date" class="form-control" id="nasccol-name">
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
<div class="modal fade" id="editattr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" name="submit" method="POST" action="../sistema/php/updtcollabatr.php">
           <input name="codattr" type="hidden" class="form-control" id="codattr-name">
          <div class="form-group">
            <label for="idcolatr-name" class="col-form-label">Nome:</label>
            <input name="nomecolatr" type="text" class="form-control" id="idcolatr-name" disabled="disabled">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-6"><label for="cpfcolatr-name" class="col-form-label">CPF:</label></div>
              <div class="col-6"><label for="cnpjcolatr-name" class="col-form-label">CNPJ:</label></div>
            </div>
           <div class="row">
           <div class="col-6"> <input name="usuariocol" type="text" class="form-control" id="cpfcolatr-name" disabled="disabled"></div>
           <div class="col-6"> <input name="cpfcol" type="text" class="form-control" id="cnpjcolatr-name" disabled="disabled"></div>
          </div>
          </div>
          <div class="form-group">
            <label for="codatrb-name" class="col-form-label">Classe:</label>
              <select name="attrcoledit" class="custom-select" id="inputGroupSelect01">
                          <option class="esp"><span>&times;</span> </option>
                            <?php            
                                     while($exbBasAtredit = mysqli_fetch_array($rsltBasAtredit)){
                                     ?>  
                                    <option value="<?php  echo $exbBasAtredit['cod_bat'] ;?>">
                                      <?php echo $exbBasAtredit['atributo'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select>
          </div>
          <div class="form-group">
            <label for="codnvl-name" class="col-form-label">Especialização:</label>
            <select name="nvlcoledit" class="custom-select" id="inputGroupSelect01">
                          <option class="nvl"><span>&times;</span></option>
                            <?php            
                                     while($exbBasNvledit = mysqli_fetch_array($rsltBasNvledit)){
                                     ?>  
                                    <option value="<?php  echo $exbBasNvledit['cod_nvl'] ;?>">
                                      <?php echo $exbBasNvledit['nivel'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../Frameworks/js/bootstrap.js"></script>
    <script type="text/javascript">
     $('#editcol').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var editcol = button.data('editcol')
  var idcol = button.data('idcol')
  var nomecol = button.data('nomecol')
  var usuariocol = button.data('usuariocol')
  var cpfcol = button.data('cpfcol')
  var cnpjcol = button.data('cnpjcol')
  var nasccol = button.data('nasccol') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar colaboradores')
  modal.find('#idcol-name').val(idcol)
  modal.find('#nomecol-name').val(nomecol)
  modal.find('#usuariocol-name').val(usuariocol)
  modal.find('#cpfcol-name').val(cpfcol)
  modal.find('#cnpjcol-name').val(cnpjcol)
  modal.find('#nasccol-name').val(nasccol)
})   
     $('#editattr').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var editattr = button.data('editattr')
  var codattr = button.data('codattr')
  var codnvl = button.data('codnvl')
  var idcolatr = button.data('idcolatr')
  var cpfcolatr = button.data('cpfcolatr')
  var cnpjcolatr = button.data('cnpjcolatr')
  var codatrb = button.data('codatrb') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar atributos de colaboradores')
  modal.find('#codattr-name').val(codattr)
  modal.find('#codnvl-name').val(codnvl)
  modal.find('#idcolatr-name').val(idcolatr)
  modal.find('#cpfcolatr-name').val(cpfcolatr)
  modal.find('#cnpjcolatr-name').val(cnpjcolatr)
  modal.find('.esp').text(codatrb)
  modal.find('.nvl').text(codnvl)
})
    </script>
  </body>
</html>