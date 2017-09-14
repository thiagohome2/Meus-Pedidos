    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Avaliação de Candidato</h1>
      </div>
        
        
        <?php if($alerta != null){?>
                <div class="alert alert-<?php echo $alerta['class'];?> fade in alert-dismissable">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $alerta['mansagem'];?>
                </div>
        <?php }?>
        <form id="form-cadastro" action="<?php echo base_url('candidato/avaliacao');?>" method="POST" >
            
            <h3>Dados do candidato: </h3>
            <div class="form-group">
              <label for="nome">Seu Nome *</label>
              <input type="text" class="form-control" id="nome" value="<?php echo set_value('nome'); ?>" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="email">Endereço de e-mail *</label>
              <input type="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>" placeholder="Email" required>
            </div>    
            
            
            <h3>Avalie seu conhecimento de 0 a 10 nos seguintes itens: </h3>
            <div class="row">
                <div class="col-md-4">
                    <p>HTML</p>
                    <input id="html" name="html" value="<?php echo set_value('html'); ?>" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A">
                </div>
                <div class="col-md-4">
                    <p>CSS</p>
                    <input id="css" name="css" value="<?php echo set_value('css'); ?>" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="0">
                </div> 
                <div class="col-md-4">
                    <p>Javascript</p>
                    <input id="javascript" name="javascript" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="0">
                </div> 
            </div>
            
          
            
            <div class="row">
                <div class="col-md-6">
                    <p>Python</p>
                    <input id="python" name="python" value="<?php echo set_value('python'); ?>" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#ffec03" value="0">
                </div>
                <div class="col-md-6">
                    <p>Django</p>
                    <input id="ios" name="django" value="<?php echo set_value('django'); ?>"class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#ffec03" value="0">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <p>Desenvolvimrnto IOS</p>
                    <input id="ios" name="ios" value="<?php echo set_value('ios'); ?>" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#2184be" value="0">
                </div>
                <div class="col-md-6">
                    <p>Desenvolvimento Android</p>
                    <input id="android" name="android" value="<?php echo set_value('android'); ?>" class="dial" data-width="100" data-min="0" data-max="10" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#2184be" value="0">
                </div>
            </div>
            <button type="submit" name="salvar" value="salvar" class="btn btn-default">Enviar</button>
          </form>
        
    </div>