<?php
  include "../Sistema/DB/connectview.php";
  include"../Sistema/PHP/class.php";
  session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
  $slcOs="select * from ordem_servico order by codigo desc";
  $rsltOs=mysqli_query($link,$slcOs);

  // Fazer um relatório com somas de valores de lucros.
   $testedata= "SELECT YEAR(data) as ano, WEEK(data) as semana, SUM(totalpago) as brutotal FROM ordem_servico GROUP BY ano, semana";
 // $totaltestedata=mysqli_query($link,$testedata);
 // $exibetestedata=mysqli_fetch_array($totaltestedata);
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
                          <script src="../Frameworks/js/Chart.bundle.js"></script>

 <canvas id="myChart" height=90></canvas>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ /*'<?php echo $psqOs["usuario"];?>'*/],
        datasets: [{
            label: 'Total de serviços semana',
            data: [/*'<?php echo $psqOs["total"];?>',*/],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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

          </div>
        </div>
        <div class="row">
          <div class="col-12">


 

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

//while( $exbOs = mysqli_fetch_array($rsltOs)){
  

     //   echo "<tr><td>".$exbOs['codigo']."</td>";
   //     echo "<td>".$exbOs['descricao']."</td>";
   //     echo "<td><p class='text-warning'>".$exbOs['tipo']."</p></td>";
      //  echo "<td> <p class='text-success'>".$exbOs['status']."</p></td>";
   //     echo "<td>".$exbOs['data']."</td>";
   //     echo "<td><p class='text-danger'>".$exbOs['formapagamento']."</p></td>";
    //    echo "<td>".$exbOs['parcelas']."</td>";
      //  echo "<td>".$exbOs['totalpagar']."</td>";
      //  echo "<td>".$exbOs['totalpago']."</td></tr>";
       

     /* if(isset($parcelas)){
        echo'<td><?php echo $parcelas; ?></td>'
      }
      else{

        }

        
     

      }*/


    


   

  
// } ?>
   
 </tbody>
</table>
            <!-- Inserir dados aqui-->
            <div class="alert alert-success" role="alert">
   <!--  TESTE DE DATA, SEMANA E TOTAL (SOMA VALORES NAS COLUNAS)-->

          <?php
        //  $liquitotal=$exibetestedata['brutotal']-($exibetestedata['brutotal']*60/100);
        //    echo $exibetestedata['ano']."<-Ano, Semana->".$exibetestedata['semana']." Total Bruto:".$exibetestedata['brutotal']."Total Liquido:".$liquitotal;
            ?> 
</div>
         
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
        <li class="nav-item">
          <a class="nav-link" href="../Web/auth.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-home"></i> </font></font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Web/ppl.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-users"></i></font></font></a>
        </li>
       <!-- <li class="nav-item">
          <a class="nav-link" href="../Web/fnc.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fornecedores</font></font></a>
        </li>-->
        <li class="nav-item active">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../Frameworks/js/bootstrap.js"></script>
  </body>
</html>

