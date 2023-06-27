<?php
    class DirectivosController{
        private $model;
        public function __construct()
        {
            require_once "/opt/lampp/htdocs/proyecto_bases/model/DirectivosModel.php";
            $this->model=new DirectivosModel();
        }
        public function index(){
            return($this->model->index()) ? $this->model->index() : false;
        }
        public function show($cod_directivo){
            return ($this->model->show($cod_directivo)!=false) ? $this->model->show($cod_directivo) : header("Location:Directivos.php");
        }
        public function update($cod_directivo,$nomb_directivo,$apell_directivo)
        {
            return($this->model->update($cod_directivo,$nomb_directivo,$apell_directivo)!=false)? header("Location:showDirectivos.php?=".$cod_directivo): header("Location:Directivos.php");
        }
        public function generarReporteDirectivos($codigo_ies_padre, $fecha_inicio, $fecha_final){
            return($this->model->generarReporteDirectivos($codigo_ies_padre, $fecha_inicio, $fecha_final)) ? $this->model->generarReporteDirectivos($codigo_ies_padre, $fecha_inicio, $fecha_final):false;
            
        }
    }
?>