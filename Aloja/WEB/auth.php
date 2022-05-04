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

          <!--  TESTE DE DATA, SEMANA E TOTAL (SOMA VALORES NAS COLUNAS)

          <?php
            //echo $exibetestedata['ano']."<-Ano, Semana->".$exibetestedata['semana']." Col total: (colaboradores)".$exibetestedata['col_total'];
            ?> -->           
    <div class="row">
      <div class="col-2">                                  
        <ul class="nav flex-column bg-dark">
  <li class="nav-item">
    <a class="nav-link text-light bg-dark" href="#"  onclick="loadXMLFormhelp()"><i class="fas fa-info-circle"></i> Ajuda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light bg-dark" href="#" onclick="loadXMLFormpass()"><i class="fas fa-cogs"></i> Mudar senha</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active text-light bg-dark" href="#" onclick="loadXMLTableshop()"><i class="fas fa-boxes"></i> Status Estoque</a>
  </li>
</ul>
      </div>
    
    <div class="col-10">

<div id="help" style="display:none;">

</div>
<div id="pass" style="display:none;">

</div>

<div id="shop" style="display:none;">

</div>

<script>
function loadXMLFormhelp() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("help").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "../Web/forms/formteste.php", true);
  xhttp.send();

  var o1 =document.getElementById('pass');
  var i1 =document.getElementById('help');
  var o2 =document.getElementById("shop");
  if (o1.style.display = 'block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
  }if(o2.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
  }
}

function loadXMLFormpass() {
  var xhttpa = new XMLHttpRequest();
  xhttpa.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("pass").innerHTML =
      this.responseText;
    }
  };
  xhttpa.open("GET", "../Web/forms/formpass.php", true);
  xhttpa.send();
  var o1 =document.getElementById('help');
  var i1 =document.getElementById('pass');
  var o2 =document.getElementById("shop");
  if (o1.style.display = 'block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
  }if(o2.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
  }
 }

 function loadXMLTableshop() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("shop").style.display = 'block';
      document.getElementById("shop").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "../Web/tables/tableprovshop.php", true);
  xhttp.send();
  var o1 =document.getElementById('help');
  var i1 =document.getElementById('shop');
  var o2 =document.getElementById("pass");
  if (o1.style.display = 'block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
  }if(o2.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
  }
}

</script>
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
        <li class="nav-item">
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../Frameworks/js/bootstrap.js"></script>
  </body>
</html>

