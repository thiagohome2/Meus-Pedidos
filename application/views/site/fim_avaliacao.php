 <div class="page-header">
          <h2 class="titulo centralizado">Avaliação de Candidato</h2>
          <h3></h3>
      </div>
        
    <div class="container">
      
        
        <?php if($alerta != null){?>
                <div class="alert alert-<?php echo $alerta['class'];?> fade in alert-dismissable">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $alerta['mansagem'];?>
                </div>
        <?php }?>
        <div class="row">
            <div class="col-md-12">
                <h3 class="centralizado">Obrigado por se candidatar! :)</h3>
                <p class="centralizado">
                    Boa Sorte!
                </p>
                <a href="<?php echo base_url()?>">Voltar</a>
            </div>
        </div>
  
        
    </div>

