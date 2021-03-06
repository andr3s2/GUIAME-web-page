<?php

class Model {

    protected $host;
    protected $username;
    protected $pass;
    protected $bd;
    protected $link;

    public function __construct() {
        $this->host = "localhost";
        $this->username = "root";
        $this->pass = "f273e31c203a8716dbb3958910a4dd1a71b12426269a2e9c";
        $this->bd = "guiame";
        $this->link = mysqli_connect($this->host, $this->username, $this->pass);
        mysqli_select_db($this->link,$this->bd);
        mysqli_set_charset($this->link, "utf8");
    }

    #funciones para los INVESTIGADORES  

    public function get_all_investigadores() {
        $query = "SELECT * FROM investigador ORDER BY rol DESC ";
        return $this->exec_query($query);
    }

    public function get_n_investigadores($n = 3) {

        $query = "SELECT * FROM investigador";

        $result = $this->exec_query($query);

        $investigadores = array();
        while ($inv = mysqli_fetch_array($result)) {
            $investigadores[] = $inv;
        }
        shuffle($investigadores);


        return array_slice($investigadores, 0, $n);
    }

    public function get_proyectos_investigador($investigador) {

        $query = "SELECT p.nombre as nombre, p.url"
                . " FROM investigador_x_proyecto ip, proyecto p"
                . " WHERE ip.investigador='$investigador' AND ip.proyecto = p.id";
        $result = $this->exec_query($query);


        $proyectos = array();

        while ($proy = mysqli_fetch_array($result)) {
            $proyectos[] = array('nombre' => $proy['nombre'], 'url' => $proy['url']);
        }

        return $proyectos;
    }

    #funciones para las NOTICIAS

    public function get_all_noticias() {
        $query = "SELECT * FROM noticia";
        return $this->exec_query($query);
    }

    #funciones para los PROYECTOS

    public function get_all_proyectos() {
        $query = "SELECT * FROM proyecto";
        return $this->exec_query($query);
    }

    public function get_n_proyectos($n = 3) {

        $query = "SELECT * FROM proyecto";

        $result = $this->exec_query($query);

        $proyectos = array();
        while ($proy = mysqli_fetch_array($result)) {
            $proyectos[] = $proy;
        }
        shuffle($proyectos);


        return array_slice($proyectos, 0, $n);
    }

    #funciones para las PUBLICACIONES

    public function get_all_publicaciones($tipo='a') { //a:articulo, c: congreso
      
      switch($tipo){
        case 'a': //articulo
          $query = "SELECT * FROM publicacion WHERE tipo='a' ORDER BY fecha_publicacion DESC";
        case 'c': //congreso
          $query = "SELECT * FROM publicacion ORDER BY fecha_publicacion DESC";
      }
        
      
        
        return $this->exec_query($query);
    }
    
    #funciones para los eventos
    public function get_all_events(){
         $query = "SELECT * FROM evento ORDER BY fecha DESC";
        return $this->exec_query($query);
    }

   

    public function get_n_publicaciones($n) {
        $query = "SELECT * FROM publicacion ORDER BY fecha_publicacion DESC LIMIT $n";
        return $this->exec_query($query);
    }

    #funciones útiles

    private function exec_query($query) {

        return mysqli_query($this->link, $query);
    }

    public static function procesar_proyectos($proyectos) {

        $str = "";
        foreach ($proyectos as $p) {
            $str .= "<a href='{$p['url']}' target='_blank'''>[{$p['nombre']}]</a> ";
        }

        return $str;
    }
	
	
    #funciones utiles

    public static function out($str, $controller, $c = 250) {


        if (strlen($str) <= $c)
            return $str;

        $out = substr($str, 0, $c) . "... <a href='$controller.php'>[ver más]</a>";
        return $out;
    }
    
    
    

}
