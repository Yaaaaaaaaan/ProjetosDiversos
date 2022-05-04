Remover as divs (dados, acrescentar, contatos e endereços, colocando-as em layout (a página inteira), forms (acrescentar + edições dados, contatos e endereços), tables (as tabelas com resultados de dados, contatos e endereços)).

<?php
    include "../../Sistema/DB/connectview.php";
  include"../../Sistema/PHP/class.php";
   session_cache_expire(10);
  session_start();
  $tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
 if(isset($_SESSION['nick'])){
    $slcCliIn="select * from cliente order by idClient desc";
    $rsltCliIn=mysqli_query($link,$slcCliIn);
    $slcCliCtt="select * from contato order by idClientCtt desc";
    $rsltCliCtt=mysqli_query($link,$slcCliCtt);
    // select com dois bancos e diversas tabelas. 
   // $slcCliEnd="select * from prestserv.logradouro a join prestserv.cliente b on prestserv.a.cod_logr = prestserv.b.cod_logr_cli join endsbr.bairro f on prestserv.a.bair = endsbr.f.id_b join endsbr.estado d on endsbr.f.Uf_b=endsbr.d.Uf_e join endsbr.regiao c on endsbr.d.Regiao_e = endsbr.c.id_r";

    $slcCliEnd="select * from commerce.logradouro a join commerce.cliente";
    $rsltCliEnd=mysqli_query($link,$slcCliEnd);
    $slcBasEndReg="select * from endsbr.regiao order by id_r desc";
    $rsltBasEndReg=mysqli_query($link,$slcBasEndReg);
    $slcBasEndEst="select * from endsbr.estado order by id_e desc";
    $rsltBasEndEst=mysqli_query($link,$slcBasEndEst);
    $slcBasEndRegi="select * from endsbr.regiao order by id_r desc";
    $rsltBasEndRegi=mysqli_query($link,$slcBasEndRegi);
    $slcBasEndEsta="select * from endsbr.estado order by id_e desc";
    $rsltBasEndEsta=mysqli_query($link,$slcBasEndEsta);
    $slcBasEndBUf="select * from endsbr.estado order by id_e desc";
    $rsltBasEndBUf=mysqli_query($link,$slcBasEndBUf);
    $slcBasEndBai="select * from endsbr.bairro order by id_b desc";
    $rsltBasEndBai=mysqli_query($link,$slcBasEndBai);
  }else{
    session_destroy();
    header('location:../Web/index.php');
   
  }
  
?>
<html lang="pt-BR">
  <head>

<link rel="stylesheet" type="text/css" href="../Frameworks/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../Frameworks/css/Chart.css">
    <link href="../Frameworks/css/fontawesome.css" rel="stylesheet">
    <link href="../Frameworks/css/brands.css" rel="stylesheet">
    <link href="../Frameworks/css/solid.css" rel="stylesheet">
</head>
<body>

<script src="../Frameworks/js/bootstrap.js"></script>
     <script src="../Frameworks/js/fontawesome.js"></script>
     <script src="../Frameworks/js/brands.js"></script>
       <script src="../Frameworks/js/solid.js"></script>

       <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="#"  onclick="loadXMLFormsfrmclt()">Acrescentar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" onclick="loadXMLTablecttclt()">Contatos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" onclick="loadXMLFTabledtclt()">Dados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" onclick="loadXMLTablelocctt()">Endereços</a>
  </li>
</ul>

<div id="frmclt"></div>
<div id="cttclt"></div>
<div id="dtclt"></div>
<div id="locclt"></div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="aaa-tab" data-toggle="tab" href="#" role="tab" aria-controls="aaa" aria-selected="false">Acrescentar</a>
  </li>
   <li class="nav-item">
    <a class="nav-link active" id="bbb-tab" data-toggle="tab" href="#bbb" role="tab" aria-controls="bbb" aria-selected="true">Dados</a>
  </li>

  <li class="nav-item">
    <a class="nav-link " id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="true">Contatos</a>
  </li>
   <li class="nav-item">
    <a class="nav-link " id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true">Endereços</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="bbb" role="tabpanel" aria-labelledby="bbb-tab">
    <div class="col-12" style="padding-top: 5px;">
      <table class='table table-bordered' >
        <thead>
         <th scope="col">Id</th>
         <th scope="col">Nome</th>
         <th scope="col">CPF</th>
         <th scope="col">CNPJ</th>
         <th scope="col">Nascimento</th>
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
              while( $exbCliIn = mysqli_fetch_array($rsltCliIn)){
                  echo "<tr><td>".$exbCliIn['idClient']."</td>"; 
                  echo "<td>".$exbCliIn['nomeCli']."</td>";
                  echo "<td>".$exbCliIn['cpfCli']."</td>";
                  echo "<td>".$exbCliIn['cnpjCli']."</td>";
                  echo "<td>".$exbCliIn['nascimentoCli']."</td>"; 
                  
                    switch($_SESSION["rank"]){
                      case 5:
                       echo "<td>"."<center><form method='post' action='../sistema/php/deletacli.php'> <input type='hidden' name='id' value='".$exbCliIn["idClient"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbCliIn["idClient"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcli' data-idcli='".$exbCliIn["idClient"]."' data-nomecli='".$exbCliIn['nomeCli']."' data-cpfcli='".$exbCliIn['cpfCli']."' data-cnpjcli='".$exbCliIn['cnpjCli']."' data-nasccli='".$exbCliIn['nascimentoCli']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                         case 4:
                          echo "<td>"."<center><form method='post' action='../sistema/php/deletacli.php'> <input type='hidden' name='id' value='".$exbCliIn["idClient"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbCliIn["idClient"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcli' data-idcli='".$exbCliIn["idClient"]."' data-nomecli='".$exbCliIn['nomeCli']."' data-cpfcli='".$exbCliIn['cpfCli']."' data-cnpjcli='".$exbCliIn['cnpjCli']."' data-nasccli='".$exbCliIn['nascimentoCli']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                           case 3:
                            echo "<td>"."<center><form method='post' action='../sistema/php/deletacli.php'> <input type='hidden' name='id' value='".$exbCliIn["idClient"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbCliIn["idClient"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcli' data-idcli='".$exbCliIn["idClient"]."' data-nomecli='".$exbCliIn['nomeCli']."' data-cpfcli='".$exbCliIn['cpfCli']."' data-cnpjcli='".$exbCliIn['cnpjCli']."' data-nasccli='".$exbCliIn['nascimentoCli']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                           break;
                             case 2:
                             echo"<button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcli' data-idcli='".$exbCliIn["idClient"]."' data-nomecli='".$exbCliIn['nomeCli']."' data-cpfcli='".$exbCliIn['cpfCli']."' data-cnpjcli='".$exbCliIn['cnpjCli']."' data-nasccli='".$exbCliIn['nascimentoCli']."'><i class='fas fa-marker'></i></button></center>"."</td>";
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
            <div class="row">
             <div id="newcl"></div>
             <div id="tbctt"></div>
               <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                  <div class="col-12" style="padding-top: 5px;">
     
    </div>
               </div>
               <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                <div class="col-12" style="padding-top: 5px;">
      <table class='table table-bordered' >
        <thead>
         <th scope="col">Id</th>
         <th scope="col">Nome</th>
         <th scope="col">Rua</th>
         <th scope="col">Complemento</th>
         <th scope="col">Bairro</th>
          <th scope="col">Uf</th>
         <th scope="col">Estado</th>
         <th scope="col">Região</th>
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
              while( $exbCliEnd = mysqli_fetch_array($rsltCliEnd)){
                  echo "<tr><td>".$exbCliEnd['id_cli']."</td>";
                  echo "<td>".$exbCliEnd['nome']."</td>";
                  echo "<td>".$exbCliEnd['rua']."</td>";
                  echo "<td>".$exbCliEnd['comp']."</td>";
                  echo "<td>".$exbCliEnd['Nome_b']."</td>"; 
                  echo "<td>".$exbCliEnd['Uf_b']."</td>"; 
                  echo "<td>".$exbCliEnd['Nome_e']."</td>"; 
                  echo "<td>".$exbCliEnd['Nome_r']."</td>"; 

                    switch($_SESSION["rank"]){
                      case 5:
                       echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbCliEnd["id_cli"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbCliEnd["id_cli"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcliend' data-idcliend='".$exbCliEnd["id_cli"]."' data-nomecliend='".$exbCliEnd['nome']."' data-ruacliend='".$exbCliEnd['rua']."' data-compcliend='".$exbCliEnd['comp']."' data-baicliend='".$exbCliEnd['Nome_b']."' data-ufcliend='".$exbCliEnd['Uf_b']."' data-estcliend='".$exbCliEnd['Nome_e']."' data-regcliend='".$exbCliEnd['Nome_r']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                         case 4:
                         echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbCliEnd["id_cli"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbCliEnd["id_cli"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcliend' data-idcliend='".$exbCliEnd["id_cli"]."' data-nomecliend='".$exbCliEnd['nome']."' data-ruacliend='".$exbCliEnd['rua']."' data-compcliend='".$exbCliEnd['comp']."' data-baicliend='".$exbCliEnd['Nome_b']."' data-ufcliend='".$exbCliEnd['Uf_b']."' data-estcliend='".$exbCliEnd['Nome_e']."' data-regcliend='".$exbCliEnd['nome_r']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                           case 3:
                           echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbCliEnd["id_cli"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbCliEnd["id_cli"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcliend' data-idcliend='".$exbCliEnd["id_cli"]."' data-nomecliend='".$exbCliEnd['nome']."' data-ruacliend='".$exbCliEnd['rua']."' data-compcliend='".$exbCliEnd['comp']."' data-baicliend='".$exbCliEnd['Nome_b']."' data-ufcliend='".$exbCliEnd['Uf_b']."' data-estcliend='".$exbCliEnd['Nome_e']."' data-regcliend='".$exbCliEnd['nome_r']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                           break;
                             case 2:
                             echo "<td>"."<button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editcliend' data-idcliend='".$exbCliEnd["id_cli"]."' data-nomecliend='".$exbCliEnd['nome']."' data-ruacliend='".$exbCliEnd['rua']."' data-compcliend='".$exbCliEnd['comp']."' data-baicliend='".$exbCliEnd['Nome_b']."' data-ufcliend='".$exbCliEnd['Uf_b']."' data-estcliend='".$exbCliEnd['Nome_e']."' data-regcliend='".$exbCliEnd['nome_r']."'><i class='fas fa-marker'></i></button></center>"."</td>";
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
          <!-- Fim dos dados da segunda página-->
  </div>
  </div>
</div>
          </div>
        </div>
  <div class="modal fade" id="editcli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" name="submit" method="POST" action="../sistema/php/updtclient.php">
           <div class="form-group">
           <div class="row">
              <div class="col-2"><label for="data-idcli-name" class="col-form-label">Id:</label></div>
              <div class="col-10"><label for="nomecli-name" class="col-form-label">Nome:</label></div>
            </div>
            <div class="row">
              <div class="col-2"><input name="data-idcli" type="text" class="form-control" id="idcli-name" disabled="disabled"></div>
              <div class="col-10"><input name="nomecli" type="text" class="form-control" id="nomecli-name" disabled="disabled"></div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-6"><label for="cpfcli-name" class="col-form-label">CPF:</label></div>
              <div class="col-6"><label for="cnpjcli-name" class="col-form-label">CNPJ:</label></div>
            </div>
            <div class="row">
              <div class="col-6"><input name="cpfcli" type="text" class="form-control" id="cpfcli-name"></div>
              <div class="col-6"><input name="cnpjcli" type="text" class="form-control" id="cnpjcli-name"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="nasccli-name" class="col-form-label">Nascimento:</label>
            <input name="nasccli" type="date" class="form-control" id="nasccli-name">
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
<div class="modal fade" id="editclictt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" name="submit" method="POST" action="../sistema/php/updtcclient.php">
          <div class="form-group">
           <div class="row">
              <div class="col-2"><label for="data-idclictt-name" class="col-form-label">Id:</label></div>
              <div class="col-10"><label for="nomeclictt-name" class="col-form-label">Nome:</label></div>
            </div>
            <div class="row">
              <div class="col-2"><input name="data-idclictt" type="text" class="form-control" id="idclictt-name" disabled="disabled"></div>
              <div class="col-10"><input name="nomeclictt" type="text" class="form-control" id="nomeclictt-name" disabled="disabled"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="emailclictt-name" class="col-form-label">E-mail:</label>
            <input name="emailclictt" type="text" class="form-control" id="emailclictt-name">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-6"><label for="celclictt-name" class="col-form-label">Celular:</label></div>
              <div class="col-6"><label for="telclictt-name" class="col-form-label">Telefone:</label></div>
            </div>
           <div class="row">
           <div class="col-6"> <input name="celclictt" type="text" class="form-control" id="celclictt-name"></div>
           <div class="col-6"> <input name="telclictt" type="text" class="form-control" id="telclictt-name"></div>
          </div>
          </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button submit" class="btn btn-success">Salvar</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editcliend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" name="submit" method="POST" action="../sistema/php/updtendclient.php">
           <div class="form-group">
            <div class="row">
              <div class="col-2"><label for="data-idcliend-name" class="col-form-label">Id:</label></div>
              <div class="col-10"><label for="nomecliend-name" class="col-form-label">Nome:</label></div>
            </div>
            <div class="row">
              <div class="col-2"><input name="idcliend" type="text" class="form-control" id="idcliend-name" disabled="disabled"></div>
              <div class="col-10"><input name="nomecliend" type="text" class="form-control" id="nomecliend-name" disabled="disabled"></div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-8"><label for="ruacliend-name" class="col-form-label">Rua:</label></div>
              <div class="col-4"><label for="compcliend-name" class="col-form-label">Complemento:</label></div>
            </div>
            <div class="row">
              <div class="col-8"><input name="ruacliend" type="text" class="form-control" id="ruacliend-name"></div>
              <div class="col-4"><input name="compcliend" type="text" class="form-control" id="compcliend-name"></div>
            </div>
            
          </div>
          <div class="form-group">
            <div class="row">
              
            <div class="col-4"><label for="regcliend-name" class="col-form-label">Região:</label></div>
            <div class="col-3"><label for="ufcliend-name" class="col-form-label">UF:</label></div>
            <div class="col-5"><label for="estcliend-name" class="col-form-label">Estado:</label></div>
          
          
            <div class="col-4"><select name="regcliend" class="custom-select" id="inputGroupSelect01">
                          <option class="regcliend"><span>&times;</span></option>
                            <?php            
                                     while($exbBasEndReg = mysqli_fetch_array($rsltBasEndReg)){
                                     ?>  
                                    <option value="<?php  echo $exbBasEndReg['Id_r'] ;?>">
                                      <?php  echo $exbBasEndReg['Nome_r'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select></div>
                        <div class="col-3"><select name="ufcliend" class="custom-select" id="inputGroupSelect01">
                          <option class="ufcliend"><span>&times;</span></option>
                            <?php            
                                     while($exbBasEndBUf = mysqli_fetch_array($rsltBasEndBUf)){
                                     ?>  
                                    <option value="<?php  echo $exbBasEndBUf['Id_e'] ;?>">
                                      <?php  echo $exbBasEndBUf['Uf_e'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select></div>
                           <div class="col-5"><select name="estcliend" class="custom-select" id="inputGroupSelect01">
                          <option class="estcliend"><span>&times;</span> </option>
                            <?php            
                                     while($exbBasEndEst = mysqli_fetch_array($rsltBasEndEst)){
                                     ?>  
                                    <option value="<?php  echo $exbBasEndEst['Id_e'] ;?>">
                                      <?php echo $exbBasEndEst['Nome_e'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select></div>

        </div>
      </div>         
          <div class="form-group">
            <label for="baicliend-name" class="col-form-label">Bairro:</label>
            <select name="baicliend" class="custom-select" id="inputGroupSelect01">
                          <option class="baicliend"><span>&times;</span></option>
                            <?php            
                                     while($exbBasEndBai = mysqli_fetch_array($rsltBasEndBai)){
                                     ?>  
                                    <option value="<?php  echo $exbBasEndBai['Id_b'] ;?>">
                                      <?php  echo $exbBasEndBai['Nome_b'] ;?> - <?php  echo $exbBasEndBai['Uf_b'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select>
          </div>

         <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button submit" class="btn btn-success">Salvar</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <script type="text/javascript">
     $('#editcli').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var editcli = button.data('editcli')
  var idcli = button.data('idcli')
  var nomecli = button.data('nomecli')
  var cpfcli = button.data('cpfcli')
  var cnpjcli = button.data('cnpjcli')
  var nasccli = button.data('nasccli') 
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar Clientes')
  modal.find('#idcli-name').val(idcli)
  modal.find('#nomecli-name').val(nomecli)
  modal.find('#cpfcli-name').val(cpfcli)
  modal.find('#cnpjcli-name').val(cnpjcli)
  modal.find('#nasccli-name').val(nasccli)
})   
     $('#editclictt').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var editclictt = button.data('editclictt')
  var idclictt = button.data('idclictt')
  var nomeclictt = button.data('nomeclictt')
  var celclictt = button.data('celclictt')
  var telclictt = button.data('telclictt')
  var emailclictt = button.data('emailclictt')
  //var codatrb = button.data('codatrb') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar Contatos')
  modal.find('#idclictt-name').val(idclictt)
  modal.find('#nomeclictt-name').val(nomeclictt)
  modal.find('#celclictt-name').val(celclictt)
  modal.find('#telclictt-name').val(telclictt)
  modal.find('#emailclictt-name').val(emailclictt)
})
          $('#editcliend').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var editcliend = button.data('editcliend')
  var idcliend = button.data('idcliend')
  var nomecliend = button.data('nomecliend')
  var ruacliend = button.data('ruacliend')
  var baicliend = button.data('baicliend')
  var ufcliend = button.data('ufcliend')
  var estcliend = button.data('estcliend')
  var regcliend = button.data('regcliend')
  var compcliend = button.data('compcliend')
  //var codatrb = button.data('codatrb') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar Endereços')
  modal.find('#idcliend-name').val(idcliend)
  modal.find('#nomecliend-name').val(nomecliend)
  modal.find('#compcliend-name').val(compcliend)
  modal.find('#ruacliend-name').val(ruacliend)
  modal.find('.regcliend').text(regcliend)
  modal.find('.estcliend').text(estcliend)
  modal.find('.baicliend').text(baicliend)
  modal.find('.ufcliend').text(ufcliend)
})
    </script>
<script>
    function loadXMLFormsfrmclt() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("frmclt").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "../Web/forms/frmclt.php", true);
      xhttp.send();

      var o1 =document.getElementById('tbctt');
      var i1 =document.getElementById('frmclt');
      var o2 =document.getElementById('locclt');
      var o3 =document.getElementById('dtclt');
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

     function loadXMLTablecttclt() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("cttclt").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "../Web/tables/tablecttclt.php", true);
      xhttp.send();

      var o1 =document.getElementById('frmclt');
      var i1 =document.getElementById('cttclt');
      var o2 =document.getElementById('locclt');
      var o3 =document.getElementById('dtclt');
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

     function loadXMLTablelocclt() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("locclt").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "../Web/tables/tablelocclt.php", true);
      xhttp.send();

      var o1 =document.getElementById('frmclt');
      var i1 =document.getElementById('locclt');
      var o2 =document.getElementById('cttclt');
      var o3 =document.getElementById('dtclt');
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

     function loadXMLTabledtclt() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("dtclt").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "../Web/tables/tabledtclt.php", true);
      xhttp.send();

      var o1 =document.getElementById('frmclt');
      var i1 =document.getElementById('dtclt');
      var o2 =document.getElementById('cttclt');
      var o3 =document.getElementById('locclt');
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../Frameworks/js/bootstrap.js"></script>
 </body>
</html>
