<?php
require_once "/opt/lampp/htdocs/proyecto_bases/config/db.php";

    class InstitucionesModel{
        private $PDO;
        public function __construct()
        {
            $db= new db();
            $this->PDO= $db->conexion();
        }
        public function show($codigo_ies_padre){
            $stament= $this->PDO->prepare("SELECT i.codigo_ies_padre, i.nomb_inst, s.nomb_sector, c.nomb_academ
            FROM instituciones i
            INNER JOIN sectores s ON i.cod_sector = s.cod_sector
            INNER JOIN caracter_academico c ON i.cod_academ = c.cod_academ WHERE codigo_ies_padre=:codigo_ies_padre limit 1");
            $stament->bindParam(":codigo_ies_padre",$codigo_ies_padre);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function update($codigo_ies_padre, $nomb_inst, $cod_sector, $cod_academ) {
            $statement = $this->PDO->prepare("UPDATE instituciones SET nomb_inst=:nomb_inst, cod_sector=:cod_sector, cod_academ=:cod_academ WHERE codigo_ies_padre=:codigo_ies_padre");
            $statement->bindParam(":nomb_inst", $nomb_inst);
            $statement->bindParam(":cod_sector", $cod_sector);
            $statement->bindParam(":cod_academ", $cod_academ);
            $statement->bindParam(":codigo_ies_padre", $codigo_ies_padre);
            return ($statement->execute()) ? true : false;
        }
        
        
        public function mostrar($codigo_ies_padre){
            $stament= $this->PDO->prepare("SELECT *FROM instituciones WHERE codigo_ies_padre=:codigo_ies_padre");
            $stament->bindParam(":codigo_ies_padre",$codigo_ies_padre);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
    }

?>