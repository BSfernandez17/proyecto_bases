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
        public function NombreInstitunciones(){
            return($this->model->NombreInstituciones()) ? $this->model->NombreInstituciones():false;
        }
        public function getMunicipio(){
            return($this->model->getMunicipio()) ? $this->model->getMunicipio():false;

        }
        public function getDepartamento(){
            return($this->model->getDepartamento()) ? $this->model->getDepartamento():false;

        }
        public function get_instituciones_por_departamento($cod_depto)
        {
            $instituciones = $this->model->get_instituciones_por_departamento($cod_depto);
            $nombres = array_column($instituciones, 'nomb_inst');
            return ($nombres !== false) ? $nombres : false;
        }
        public function programas_por_departamento($cod_depto){
            $programas = $this->model->programas_por_departamento($cod_depto);
            $programas_vigente = array_column($programas, 'total_programas');
            return ($programas_vigente !== false) ? $programas_vigente : false;
        
        }
        public function contar_instituciones_por_municipio($cod_depto){
            $instituciones = $this->model->contar_instituciones_por_municipio($cod_depto);
            $cantidad_inst = array_column($instituciones, 'cantidad_instituciones');
            return ($cantidad_inst !== false) ? $cantidad_inst : false;
        }
        public function municipio_por_departamento($cod_depto){
            $instituciones = $this->model->contar_instituciones_por_municipio($cod_depto);
            $nomb_munic = array_column($instituciones, 'nomb_munic');
            return ($nomb_munic !== false) ? $nomb_munic : false;
        }
        public function stats_normas(){
            return ($this->model->stats_normas()) ? $this->model->stats_normas(): false; 
            }
    }
?>