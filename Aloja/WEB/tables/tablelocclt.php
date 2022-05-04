 <table class='table table-bordered' >
        <thead>
         <th scope="col">Id</th>
         <th scope="col">Nome</th>
         <th scope="col">Email</th>
         <th scope="col">Celular</th>
         <th scope="col">Telefone</th>
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
              while( $exbCliCtt = mysqli_fetch_array($rsltCliCtt)){
                  echo "<tr><td>".$exbCliCtt['idClientCtt']."</td>";
                  echo "<td>".$exbCliCtt['nomeCli']."</td>";
                  echo "<td>".$exbCliCtt['emailCli']."</td>";
                  echo "<td>".$exbCliCtt['celularCli']."</td>"; 
                  echo "<td>".$exbCliCtt['telefoneCli']."</td>";
                  
                    switch($_SESSION["rank"]){
                      case 5:
                       echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbCliCtt["id_cli"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbCliCtt["id_cli"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editclictt' data-idclictt='".$exbCliCtt["id_cli"]."' data-nomeclictt='".$exbCliCtt['nome']."' data-telclictt='".$exbCliCtt['telefone']."' data-celclictt='".$exbCliCtt['celular']."' data-emailclictt='".$exbCliCtt['email']."' data-nasccol='".$exbCliCtt['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                         case 4:
                         echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbColAtrIn["id_col"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrIn["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editclictt' data-idcol='".$exbColAtrIn["id_col"]."' data-nomecol='".$exbColAtrIn['nome']."' data-usuariocol='".$exbColAtrIn['usuario']."' data-cpfcol='".$exbColAtrIn['cpf']."' data-cnpjcol='".$exbColAtrIn['cnpj']."' data-nasccol='".$exbColAtrIn['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                         break;
                           case 3:
                           echo "<td>"."<center><form method='post' action='../sistema/php/deletacol.php'> <input type='hidden' name='id' value='".$exbColAtrIn["id_col"]."'></input><button type='button submit' class='btn btn-danger' name='".$exbColAtrIn["id_col"]."'><i class='fas fa-trash'></i></button></form>
                                     <button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editclictt' data-idcol='".$exbColAtrIn["id_col"]."' data-nomecol='".$exbColAtrIn['nome']."' data-usuariocol='".$exbColAtrIn['usuario']."' data-cpfcol='".$exbColAtrIn['cpf']."' data-cnpjcol='".$exbColAtrIn['cnpj']."' data-nasccol='".$exbColAtrIn['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                           break;
                             case 2:
                             echo "<td>"."<center><button type='button submit' class='btn btn-secondary' data-toggle='modal' data-target='#editclictt' data-idcol='".$exbColAtrIn["id_col"]."' data-nomecol='".$exbColAtrIn['nome']."' data-usuariocol='".$exbColAtrIn['usuario']."' data-cpfcol='".$exbColAtrIn['cpf']."' data-cnpjcol='".$exbColAtrIn['cnpj']."' data-nasccol='".$exbColAtrIn['nascimento']."'><i class='fas fa-marker'></i></button></center>"."</td>";
                             break;
                               case 1:
                               break;
                    }
                    }
            ?>
          </tbody>
      </table>