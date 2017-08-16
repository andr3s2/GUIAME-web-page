
   
   
    <div class="container">
        <div class="row">
            
             <h2 class='pull-left'><span class='letter'>Publicaciones</span></h2>
             <br>
             <br>
             <br>
            <ul>

                <?php while ($publicacion = mysqli_fetch_array($data['publicaciones'])) { ?>
                    <li> <var><?php echo $publicacion[1] ?></var></li>
                    <br>
                <?php } ?>
            </ul>
        </div>
    </div>




