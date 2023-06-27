<?php
    class InstitucionesController{
        private $model;
        public function __construct()
        {
            require_once "/opt/lampp/htdocs/proyecto_bases/model/InstitucionModel.php";
            $this->model=new InstitucionesModel();
        }
        public function index(){
            return($this->model->index()) ? $this->model->index() : false;
        }
        public function show($codigo_ies_padre){
            return ($this->model->show($codigo_ies_padre)!=false) ? $this->model->show($codigo_ies_padre) : header("Location:index.php");
        }
        public function update ($codigo_ies_padre,$nomb_inst,$cod_sector,$cod_academ){
            return ($this->model->update($codigo_ies_padre,$nomb_inst,$cod_sector,$cod_academ)!=false) ? ("Location:showInstitucion.php?=".$codigo_ies_padre) :header("Location:index.php");
        }
        public function mostrar($codigo_ies_padre){
            return ($this->model->show($codigo_ies_padre)!=false) ? $this->model->mostrar($codigo_ies_padre) : header("Location:index.php");
        }
        public function cobertura($departamento,$municipio){
            return($this->model->cobertura($departamento,$municipio)) ? $this->model->cobertura($departamento,$municipio) : false;
        }
        public function Instituciones_por_acto($nomb_municipio){
            return($this->model->Instituciones_por_acto($nomb_municipio))? $this->model->Instituciones_por_acto($nomb_municipio): false;
        }
    }
?>