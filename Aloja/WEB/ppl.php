<?php
    include "../Sistema/DB/connectview.php";
  include"../Sistema/PHP/class.php";
   session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
 if(isset($_SESSION['nick'])){
   
  }else{
    session_destroy();
    header('location:../Web/index.php');
   
  }
  


?>
<html lang="pt-BR">
  <head>
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
            <div class="row">
              <div class="col-2">
                   <ul class="nav flex-column bg-dark">
                    <li class="nav-item">
                      <a class="nav-link active text-light bg-dark" href="#" onclick="loadXMLTablenote()"><i class="fas fa-newspaper"></i> Anotações</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light bg-dark" href="#" onclick="loadXMLTableinfoa()"><i class="fas fa-chart-bar"></i> Visão geral</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light bg-dark" href="#" onclick="loadXMLTablefunc()"><i class="fas fa-id-card-alt"></i> Funcionários</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active text-light bg-dark" href="#" onclick="loadXMLTableclient()"><i class="fas fa-newspaper"></i> Clientes</a>
                    </li>
                  </ul>
                
              </div>
              <div class="col-10">
                <div id="note" style="display:none;">
                  <!-- Dados da Visão geral (Tableinfo) -->
                </div>

                <div id="info" style="display:none;">
                  <!-- Dados de Funcionários (Tablefunc) -->
                </div>
                <div id="func" style="display:none;">
                  <!-- informações e notas sobre funcionários (Tablenote) -->
                </div>

                 <div id="client" style="display:none;">
                  <!-- Dados de Clientes (Tableclient) -->
                </div>

                <script>
function loadXMLTablenote() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("note").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "../Web/tables/tablenote.php", true);
  xhttp.send();

  var o1 =document.getElementById('info');
  var i1 =document.getElementById('note');
  var o2 =document.getElementById('func');
  var o3 =document.getElementById('client');
  if (o1.style.display = 'block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o2.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o3.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }
}

function loadXMLTableinfo() {
  var xhttpa = new XMLHttpRequest();
  xhttpa.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("info").innerHTML =
      this.responseText;
    }
  };
  xhttpa.open("GET", "../Web/layout/layoutallview.php", true);
  xhttpa.send();
 var o1 =document.getElementById('note');
  var i1 =document.getElementById('info');
  var o2 =document.getElementById('func');
  var o3 =document.getElementById('client');
  if (o1.style.display = 'block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o2.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o3.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }
 }

 function loadXMLTablefunc() {
  var xhttpb = new XMLHttpRequest();
  xhttpb.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("func").innerHTML =
      this.responseText;
    }
  };
  xhttpb.open("GET", "../Web/layout/layoutdatafunc.php", true);
  xhttpb.send();
 var o1 =document.getElementById('info');
  var i1 =document.getElementById('func');
  var o2 =document.getElementById('note');
  var o3 =document.getElementById('client');
  if (o1.style.display = 'block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o2.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o3.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }
}

 function loadXMLTableclient() {
  var xhttpc = new XMLHttpRequest();
  xhttpc.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("client").innerHTML =
      this.responseText;
    }
  };
  xhttpc.open("GET", "../Web/layout/layoutclient.php", true);
  xhttpc.send();
 var o1 =document.getElementById('info');
  var i1 =document.getElementById('client');
  var o2 =document.getElementById('func');
  var o3 =document.getElementById('note');
  if (o1.style.display = 'block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o2.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }if(o3.style.display='block'){
    o1.style.display = "none";
    i1.style.display = "block";
    o2.style.display = "none";
    o3.style.display = "none";
  }
}
</script>
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-pills-vgeral" role="tabpanel" aria-labelledby="v-pills-vgeral-tab">
                     
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

  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../Frameworks/js/bootstrap.js"></script>
   
  </body>
</html>
