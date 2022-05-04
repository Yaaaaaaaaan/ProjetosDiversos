 <form class="form" name="submit" method="POST" action="../sistema/php/newclientger.php">
                  <div style="padding-top: 15px;">
                    <center><h4 class="card-title" style="color:#737880">Informações gerais</h4></center>
                  </div>
                  <div class="form-group" style="padding-top: 0px;margin-top: 0px;">                               
                    <label for="colFormLabel" class="col-form-label">Nome completo: </label>
                      <input type="text" class="form-control" id="nome" placeholder="Ex: João Augusto Silva Ferreira" name="nome">
                  </div>
                  <div class="form-group">                               
                    <label for="colFormLabel" class="col-form-label">Nascimento: </label>
                      <input type="date" class="form-control" id="nascimento"  name="nascimento">
                  </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-4"><label for="cpf" class="col-form-label">CPF: </label></div>
                        <div class="col-4"><label for="cnpj" class="col-form-label">CNPJ: </label></div>
                        <div class="col-4"><label for="" class="col-form-label">Região:</label></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><input name="cpf" type="text" class="form-control" id="cpf"></div>
                        <div class="col-4"><input name="cnpj" type="text" class="form-control" id="cnpj"></div>
                         <div class="col-4"><select name="regiao" class="custom-select" id="inputGroupSelect01">
                          <option>Selecione...</option>
                            <?php            
                                     while($exbBasEndRegi = mysqli_fetch_array($rsltBasEndRegi)){
                                     ?>  
                                    <option value="<?php  echo $exbBasEndRegi['Id_r'] ;?>">
                                      <?php  echo $exbBasEndRegi['Nome_r'] ;?>
                                    </option>  
                                  <?php
                                    } 
                                  ?> 
                        </select></div>
                      </div>
                    </div>
                    <hr style="border:solid 1px #B8C0CC;">
                     <div style="padding-top: 15px;">
                    <center><h4 class="card-title" style="color:#737880">Informações pessoais</h4></center>
                  </div>                 
                  <div class="form-group">                               
                    <label for="colFormLabel" class="col-form-label">E-mail: </label>
                      <input type="text" class="form-control" id="email" placeholder="Ex: JoaoA1@email.com" name="email">
                  </div>
                  <div class="form-group">                               
                    <label for="colFormLabel" class="col-form-label">Telefone: </label>
                      <input type="text" class="form-control" id="telefone" placeholder="Ex: 2125545545" name="telefone">
                  </div>
                    <div class="form-group">                               
                      <label for="colFormLabel" class="col-form-label">Celular: </label>
                        <input type="text" class="form-control" id="celular" placeholder="Ex: 21996550421" name="celular">
                    </div>
                    <div class="form-group">
                      <div class="col-10"></div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-check"></i></button>
                    </div>
                    </div>
                </form>