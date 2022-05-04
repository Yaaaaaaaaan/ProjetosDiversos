<?php
  include "../Sistema/DB/connectview.php";
  include"../Sistema/PHP/class.php";
  session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['nick'])){
    $idCliente="1";
  $slcOs="select * from transacao inner join compra on codProcedTr=codProcedTrCom inner join produto on codPdt=codPdtCom inner join Cliente on idClient=idClientTr";

  $slcOst="select count (codProcedTrCom) as nitem from compra inner join transacao on codProcedTrCom=codProcedTr inner join produto on codPdt=codPdtCom inner join Cliente on idClient=idClientTr";
  $rsltOs=mysqli_query($link,$slcOs);

  $slcProdComp="select * from produto";
  $rsltProdComp=mysqli_query($link,$slcProdComp);
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
     <link href="../Frameworks/css/brands.css" rel="stylesheet">
    <link href="../Frameworks/css/solid.css" rel="stylesheet">
     <link href="../Frameworks/css/fontawesome.css" rel="stylesheet">

    <title>Início - CONSTRUTEC</title>
  </head>
  <body>
     <script src="../Frameworks/js/bootstrap.js"></script>
<script src="../Frameworks/js/fontawesome.js"></script> <script src="../Frameworks/js/brands.js"></script>
     <script src="../Frameworks/js/solid.js"></script>

      <link rel="stylesheet" type="text/css" href="../Frameworks/css/Chart.css">         
        <div class="container-fluid">

        <div class="row">
          <div class="col-6">
           <table class='table table-bordered table-responsive-xl' >
              <thead>
               <th scope="col">Produto / Descrição</th>
               <th scope="col">Quantidade</th>
               <th scope="col">Ações</th>
              </thead>
                <tbody>
                  <tr>
                    <td>
                       <select name="Prod" class="custom-select" id="inputSelect">
                          <option>Selecione</option>
                            <?php

                                     while($exbProdComp = mysqli_fetch_array($rsltProdComp)){
                                     ?>  
                                    <option value="<?php  echo $exbProdComp['codPdt'] ;?>">
                                      <?php echo $exbProdComp['nomePdt']." - ". $exbProdComp['descricaoPdt'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select>  
                    </td>
                      <td>
                         <select name="Qtd" class="custom-select" id="inputSelect">
                          <option>Quantidade</option>
                            <?php /*           
                                     while($exbBasNvl = mysqli_fetch_array($rsltBasNvl)){
                                     ?>  
                                    <option value="<?php  echo $exbBasNvl['cod_nvl'] ;?>">
                                      <?php echo $exbBasNvl['nivel'] ;?>
                                    </option>  
                                  <?php
                                    } */
                                  ?> 
                        </select>  
                      </td>
                        <td>
                         <button type="button" class="btn btn-outline-success btn-lg btn-block"><i class="fas fa-cart-plus"></i></button> 
                        </td>                   
                  </tr>       
                </tbody>
            </table>
          </div>
          <div class="col-6" >
            <div style="overflow-y:auto;max-height:480px;">

 

         <table class='table table-bordered table-responsive-xl' >
 <thead>
      
     <!--<th scope="col">Nº. Item</th>-->
     <th scope="col">Cód.</th>
     <th scope="col">Produto</th>
     <th scope="col">Descrição</th>
     <th scope="col">Qtd.</th>
     <th scope="col">V. unit.</th>
     <th scope="col">Id cliente</th>
     <th scope="col">Total</th> 
     <?php
       switch($_SESSION["rank"]){
                      case 10:
                       echo "<th scope='col'>Ações</th>";
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
      ?>
 </thead>
<tbody>
 

 
  <?php
    $totalpagar= 0;
    $pago= 0;
    $vtotal = 0;
while( $exbOs = mysqli_fetch_array($rsltOs)){
           $vtotal= $exbOs['QtdProdCom'] * $exbOs['valorvendaPdt'];
      //  echo "<tr><td>".$exbOs['nitem']."</td>";
        echo "<td>".$exbOs['codPdt']."</td>";
        echo "<td>".$exbOs['nomePdt']."</td>";
        echo "<td>".$exbOs['descricaoPdt']."</td>";
        echo "<td> ".$exbOs['QtdProdCom']."</td>";
        echo "<td>".$exbOs['valorvendaPdt']."</td>";
         echo "<td>".$exbOs['idClient']."</td>";
        echo "<td><p class='text-danger'>".$vtotal."</p></td>";
         switch($_SESSION["rank"]){
                      case 10:
                       echo "<td>"."<center><form method='post' action='../sistema/php/deletacli.php'> <input type='hidden' name='id' value=''></input><button type='button submit' class='btn btn-danger' name=''><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcli' data-idcli='' data-nomecli='' data-cpfcli='' data-cnpjcli='' data-nasccli=''><i class='fas fa-marker'></i></button></center>"."</td></tr>";
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
         

             
          
           
          </div>
      <div class="fixed-bottom">
        <div class="row">
           <div class="col-4">

                <table class='table table-bordered table-responsive-xl' >
                  <thead>
                    <th scope="col">Total itens</th>
                  </thead>
                    <tbody>
                      <td>
                           
                      </td>
                    </tbody>
                </table>             
              </div>
            <div class="col-4">
               <table class='table table-bordered table-responsive-xl' >
              <thead>
               <th scope="col">Valor total</th>
               
              </thead>
                <tbody>
                  <tr>
                    <td>
                       
                    </td>
                          
                  </tr>       
                </tbody>
            </table>
            </div>

          <div class="col-4">
              <button type="button" class="btn btn-outline-success btn-lg btn-block"><i class="fas fa-check"></i></button> 
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
        <li class="nav-item">
          <a class="nav-link" href="../Web/rlt.php"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-2x fa-box-open"></i></font></font></a>
        </li>
        <li class="nav-item active">
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

