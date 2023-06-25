<?php
    class InstitucionesController{
        private $model;
        public function __construct()
        {
            require_once "/opt/lampp/htdocs/proyecto_bases/model/InstitucionModel.php";
            $this->model= new InstitucionesModel();
        }
        public function show($codigo_ies_padre){
            return ($this->model->show($codigo_ies_padre)) ? $this->model->show($codigo_ies_padre) : header("Location:index.php");
        }
        public function update($codigo_ies_padre, $nomb_inst, $cod_sect, $cod_academ){
            if ($this->model->update($codigo_ies_padre, $nomb_inst, $cod_sect, $cod_academ)) {
                header("Location: show.php?codigo_ies_padre=".$codigo_ies_padre);
            } else {
                echo "HUBO UN ERROR";
            }
        }
        
        
        public function mostrar($codigo_ies_padre){
            return ($this->model->mostrar($codigo_ies_padre)) ? $this->model->mostrar($codigo_ies_padre) : header("Location:index.php");
        }
    }


?>