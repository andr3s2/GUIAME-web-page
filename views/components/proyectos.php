



<br>
<div class="container">
    <div class="row">

        <h2 class='pull-left'><span class='letter'>Proyectos</span></h2>
        <br>
        <br>
        <br>
        <br>
        
        
       <?php  while($proyecto = mysql_fetch_array($data['proyectos'])) {?> 
        
        <div class="container-fluid">
            <div class="row">
                
                
                <div class="col-xs-12 col-sm-3">
                    <a href="<?php echo $proyecto['url'] ?>" target="_blank"><img class='foto-proyecto-grande' src='./assets/img/proyectos/<?php echo $proyecto['imagen']?>' style='width: 200px; height: 100px;'> </a>
                </div>
                
                <div class="col-xs-12 col-sm-9">
                    <h3 style="margin-top: -10px"><a href="<?php echo $proyecto['url'] ?>" target="_blank"><?php  echo $proyecto['nombre'] ?></a></h3> 
                    <p style="text-align: justify;"><?php echo $proyecto['resumen'] ?></p>

                </div>
                
            </div>
            
        </div>
        <hr>  
        
        <?php }  ?>

        
        
        
        
    </div>
</div>
