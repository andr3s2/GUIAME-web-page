
   
   
    <div class="container">
        <div class="row">
            
             <h2 class='pull-left'><span class='letter'>Publicaciones</span></h2>
             <br>
             <br>
             <br>
            <ul>

                <?php while ($publicacion = mysql_fetch_array($data['publicaciones'])) { ?>
                    <li> <?php echo $publicacion[1] ?></li>
                    <br>
                <?php } ?>
            </ul>
        </div>
    </div>




