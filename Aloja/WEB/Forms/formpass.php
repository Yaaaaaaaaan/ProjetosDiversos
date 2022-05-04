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