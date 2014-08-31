<?php



$data['view'] = 'test';
require './views/template.php';







/*
 * 
 * if(isset($_GET['option'])){
    extract($_GET);   
    extract($_POST);   
    if($option == "mensaje"){
        $file = fopen('./messages.txt', 'a');
        $full_message = mysql_real_escape_string("{$nombre_completo}-{$organizacion}-{$correo}-{$numero}-{$mensaje}");
        fwrite($file, $full_message ."\n");
        fclose($file);
        
       // header("location:index.php");
    }
}
 */