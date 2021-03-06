<?php

require './model/Model.php';
require './classes/twitter.php';
$data = array();
$model = new Model();
$data['view'] = 'index';

if (isset($_GET['option'])) {
  $option = $_GET['option'];
  $data['view'] = $option;
  switch ($option) {
    case 'investigadores':
      $data['investigadores'] = $model->get_all_investigadores();
      break;
    case 'proyectos':
      $data['proyectos'] = $model->get_all_proyectos();
      break;
    case 'noticias':
      $data['noticias'] = $model->get_all_noticias();
      break;
    case 'publicaciones':
      $data['publicaciones'] = $model->get_all_publicaciones();
      break;
    case 'eventos':
      $data['eventos'] = $model->get_all_eventos();
      break;
    default:
      header('location:index.php');
  }
}else{
  #cargamos los tweets
  $tw = new Twitter();
  $data['tweets'] = $tw->get_tweets();
}


require './views/template.php';







