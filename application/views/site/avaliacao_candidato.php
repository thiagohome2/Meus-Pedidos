    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Avaliação de Candidato</h1>
      </div>
     
        <form>
            
            <h3>Dados do candidato: </h3>
            <div class="form-group">
              <label for="nome">Seu Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email">Endereço de e-mail</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>    
            
            
            <h3>Avalie seu conhecimento de 0 a 10 nos seguintes itens: </h3>
            <div class="row">
                <div class="col-md-4">
                    <p>HTML</p>
                    <input id="html" name="html" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                </div>
                <div class="col-md-4">
                    <p>CSS</p>
                    <input id="css" name="css" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                </div> 
                <div class="col-md-4">
                    <p>jQuery</p>
                    <input id="jquery" name="jquery" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                </div> 
            </div>
            
          
            
            <div class="row">
                <div class="col-md-6">
                    <p>Python</p>
                    <input id="python" name="python" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                </div>
                <div class="col-md-6">
                    <p>Django</p>
                    <input id="ios" name="django" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <p>Desenvolvimrnto IOS</p>
                    <input id="ios" name="ios" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                </div>
                <div class="col-md-6">
                    <p>Desenvolvimento Android</p>
                    <input id="android" name="android" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                </div>
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
          </form>
        
    </div>
</form>
         
    </div>