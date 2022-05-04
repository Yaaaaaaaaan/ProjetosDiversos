<?php
  include "../Sistema/DB/connectview.php";
  include"../Sistema/PHP/class.php";
  session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
  $slcOs="select * from ordem_servico order by codigo desc";
  $rsltOs=mysqli_query($link,$slcOs);
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

    <title>Início - CONSTRUTEC</title>
  </head>
  <body>
     <script src="../Frameworks/js/bootstrap.js"></script>
      <link rel="stylesheet" type="text/css" href="../Frameworks/css/Chart.css">

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
        <li class="nav-item active">
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
        <!--  <div class="col-1">
                         

          </div>
        </div>
        <div class="row">-->
          <div class="col-12">


 

         <table class='table table-sm table-bordered'>
 <thead>
   
     <th scope="col">Cód</th>
     <th scope="col">Desc. serv.</th>
     <th scope="col">Tipo</th>
     <th scope="col">Status</th>
     <th scope="col">data</th>
     <th scope="col">Forma de Pagamento</th>
     <th scope="col">Parcelas</th>
     <th scope="col">Total a Pagar</th>
     <th scope="col">Total Pago</th>
   
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
        echo "<td>".$exbOs['totalpagar']."</td>";
        echo "<td>".$exbOs['totalpago']."</td></tr>";
       

     /* if(isset($parcelas)){
        echo'<td><?php echo $parcelas; ?></td>'
      }
      else{

        }

        
     

      }*/


    


   

  
 } ?>
   
 </tbody>
</table>
            <!-- Inserir dados aqui-->
            
         
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

