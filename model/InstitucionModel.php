<?php
require_once "/opt/lampp/htdocs/proyecto_bases/config/db.php";

    class InstitucionesModel{
        private $PDO;

        public function __construct()
        {
            $db= new db();
            $this->PDO= $db->conexion();
        }
        public function index(){
            $stament=$this->PDO->prepare("SELECT i.codigo_ies_padre, i.nomb_inst, s.nomb_sector, c.nomb_academ
            FROM instituciones i
            INNER JOIN sectores s ON i.cod_sector = s.cod_sector
            INNER JOIN caracter_academico c ON i.cod_academ = c.cod_academ");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function show($codigo_ies_padre){
            $stament= $this->PDO->prepare("SELECT i.codigo_ies_padre, i.nomb_inst, s.nomb_sector, c.nomb_academ
            FROM instituciones i
            INNER JOIN sectores s ON i.cod_sector = s.cod_sector
            INNER JOIN caracter_academico c ON i.cod_academ = c.cod_academ
            WHERE codigo_ies_padre=:codigo_ies_padre limit 1");
            $stament->bindParam(":codigo_ies_padre",$codigo_ies_padre);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function update($codigo_ies_padre, $nomb_inst, $cod_sector, $cod_academ)
        {
            $statement = $this->PDO->prepare("UPDATE instituciones SET nomb_inst=:nomb_inst, cod_sector=:cod_sector, cod_academ=:cod_academ WHERE codigo_ies_padre=:codigo_ies_padre");
            $statement->bindParam(":nomb_inst", $nomb_inst);
            $statement->bindParam(":cod_sector", $cod_sector);
            $statement->bindParam(":cod_academ", $cod_academ);
            $statement->bindParam(":codigo_ies_padre", $codigo_ies_padre);
            return ($statement->execute()) ? $codigo_ies_padre : false;
        }
        
        public function mostrar($codigo_ies_padre){
        $stament= $this->PDO->prepare("SELECT *FROM instituciones where codigo_ies_padre=:codigo_ies_padre limit 1");
        $stament->bindParam(":codigo_ies_padre",$codigo_ies_padre);
        return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function cobertura($departamento, $municipio)
        {
            $statement = $this->PDO->prepare("SELECT ipm.direccion, ipm.telefono, ipm.norma, ipm.fecha_creacion, ipm.programas_vigente, ipm.acreditada,
                ipm.fecha_acreditacion, ipm.resolucion_acreditacion, ipm.vigencia, ipm.nit, ipm.pagina_web,
                i.nomb_inst, m.nomb_munic, d.nomb_depto
                FROM inst_por_municipio ipm
                INNER JOIN instituciones i ON i.codigo_ies_padre = ipm.codigo_ies_padre
                INNER JOIN municipio m ON m.cod_munic = ipm.cod_munic
                INNER JOIN departamento d ON d.cod_depto = m.cod_depto
                WHERE LOWER(d.nomb_depto) = LOWER(:departamento) AND LOWER(m.nomb_munic) = LOWER(:municipio)");
        
            $statement->bindParam(":departamento", $departamento);
            $statement->bindParam(":municipio", $municipio);
        
            if ($statement->execute()) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }
        public function Instituciones_por_acto($nomb_municipio){
            $statement = $this->PDO->prepare("SELECT i.codigo_ies_padre, i.nomb_inst, ia.nomb_admon
            FROM instituciones i
            JOIN inst_por_municipio ipm ON i.codigo_ies_padre = ipm.codigo_ies_padre
            JOIN acto_admon ia ON ipm.cod_admon = ia.cod_admon
            JOIN municipio m ON ipm.cod_munic = m.cod_munic
            WHERE m.nomb_munic = :nomb_municipio;");
            
            $statement->bindParam(":nomb_municipio", $nomb_municipio);
            
            if ($statement->execute()) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }
        
        
    }
?>