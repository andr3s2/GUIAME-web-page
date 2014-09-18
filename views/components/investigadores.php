






<div class="container">
    <div class="row">

        <h1 class='pull-left'><span class='letter'>Investigadores</span></h1>
        <br>
        <br>
        <br>
        <br>
        
        <?php while($investigador = mysql_fetch_array($data['investigadores'])) {   ?>
        
        <div class="container">
            <div class="row">
                
                
                <div class="col-xs-12 col-sm-2">
                    <img class='foto-investigador' src='./assets/img/investigadores/<?php echo $investigador['imagen']?>'> 
                </div>
                
                <div class="col-xs-12 col-md-10">
                    <span class='letter'><h3 style="margin-top: -5px;"><?php echo $investigador['nombre_completo']?></h3></span>
                    <p style="text-align: justify;"><?php echo $investigador['descripcion']?></p>
                    
                    <ul>
                      <?php  if($investigador['titulos']!=""){?>
                        <li><strong>Formación académica: </strong> <?php echo $investigador['titulos']?></li>
                         <?php }  ?>
                    <li><strong>Contacto: </strong><?php echo $investigador['correo'] ?></li>
                    
                    
                    <?php $proyectos = $model->get_proyectos_investigador($investigador['id'])  ?>
                    
                    <?php  if(count($proyectos)>0) { ?>
  
                    <li><strong>Proyectos: </strong><small><?php echo Model::procesar_proyectos($proyectos) ?></small></li>
                    
        <?php }  ?>
                    
                    
                    <?php  if($investigador['url_cvlac']!=""){?>
                    <li><a href='<?php echo $investigador['url_cvlac'] ?>' target="_blank">ver CvLAC</a></li>
                    <?php }  ?>
                    </ul>   
                </div>
                
            </div>
        </div>
        <hr> 
        
        <?php } ?>
     
        
        
        
        
    </div>
</div>
</div> 