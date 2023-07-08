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
        public function cobertura($cod_depto,$cod_munic){
            if($cod_munic==null){
            $statement = $this->PDO->prepare("SELECT im.cod_munic,acreditada,nomb_estado,nomb_academ,nomb_sector,
            im.codigo_ies_padre,cod_inst,telefono,direccion,nomb_inst,nomb_depto,nomb_munic 
            from inst_por_municipio im
            join instituciones i on i.codigo_ies_padre=im.codigo_ies_padre
            join municipio on municipio.cod_munic=im.cod_munic
            join departamento  on departamento.cod_depto=municipio.cod_depto
            join sectores s on s.cod_sector= i.cod_sector
            join caracter_academico ca ON ca.cod_academ = i.cod_academ
            join estado e ON e.cod_estado = im.cod_estado
            where departamento.cod_depto=:cod_depto order by cod_inst");
            $statement->bindParam(":cod_depto", $cod_depto);
            return ($statement->execute()) ? $statement->fetchAll() : false;
            }
            else{
            $statement = $this->PDO->prepare("SELECT im.cod_munic,acreditada,nomb_estado,nomb_academ,nomb_sector,
            im.codigo_ies_padre,cod_inst,telefono,direccion,nomb_inst,nomb_depto,nomb_munic 
            from inst_por_municipio im
            join instituciones i on i.codigo_ies_padre=im.codigo_ies_padre
            join municipio on municipio.cod_munic=im.cod_munic
            join departamento  on departamento.cod_depto=municipio.cod_depto
            join sectores s on s.cod_sector= i.cod_sector
            join caracter_academico ca ON ca.cod_academ = i.cod_academ
            join estado e ON e.cod_estado = im.cod_estado
            where departamento.cod_depto=:cod_depto and municipio.cod_munic=:cod_munic order by cod_inst");
            $statement->bindParam(":cod_depto", $cod_depto);
            $statement->bindParam(":cod_munic", $cod_munic);
            return ($statement->execute()) ? $statement->fetchAll() : false;}
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
        public function NombreInstituciones (){
            $stament=$this->PDO->prepare("SELECT codigo_ies_padre,nomb_inst FROM instituciones");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function cantidad_programas($cod_depto){
            $stament=$this->PDO->prepare("SELECT nomb_munic, programas_vigente from municipio m inner join
            departamento d on m.cod_depto=d.cod_depto inner join inst_por_municipio i on i.cod_munic=m.cod_munic
            inner join
            instituciones ins on ins.codigo_ies_padre=i.codigo_ies_padre 
            WHERE d.cod_depto=:cod_depto");
            $stament->bindParam(":cod_depto",$cod_depto);
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function getInstituciones(){
            $stament=$this->PDO->prepare("SELECT *FROM instituciones");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function getMunicipio(){
            $stament=$this->PDO->prepare("SELECT *FROM municipio");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function getDepartamento(){
            $stament=$this->PDO->prepare("SELECT *FROM departamento");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function get_instituciones_por_departamento($cod_depto){
            $stament=$this->PDO->prepare("SELECT i.nomb_inst
            FROM instituciones i
            JOIN inst_por_municipio ipm ON i.codigo_ies_padre = ipm.codigo_ies_padre
            JOIN municipio m ON ipm.cod_munic = m.cod_munic
            JOIN departamento d ON m.cod_depto = d.cod_depto
            WHERE d.cod_depto = :cod_depto
            group by nomb_inst
            ");
            $stament->bindParam(":cod_depto",$cod_depto);
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function programas_por_departamento($cod_depto){
            $statement = $this->PDO->prepare("SELECT i.nomb_inst, SUM(ipm.programas_vigente) AS total_programas
            FROM instituciones i
            JOIN inst_por_municipio ipm ON i.codigo_ies_padre = ipm.codigo_ies_padre
            JOIN municipio m ON ipm.cod_munic = m.cod_munic
            JOIN departamento d ON m.cod_depto = d.cod_depto
            WHERE d.cod_depto = :cod_depto
            GROUP BY i.nomb_inst");
            $statement->bindParam(":cod_depto", $cod_depto);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function contar_instituciones_por_municipio($cod_depto){
            $statement = $this->PDO->prepare("SELECT d.nomb_depto, m.nomb_munic, COUNT(i.codigo_ies_padre) AS cantidad_instituciones
            FROM instituciones i
            JOIN inst_por_municipio ipm ON i.codigo_ies_padre = ipm.codigo_ies_padre
            JOIN municipio m ON ipm.cod_munic = m.cod_munic
            JOIN departamento d ON m.cod_depto = d.cod_depto
            WHERE d.cod_depto = :cod_depto
            GROUP BY d.nomb_depto, m.nomb_munic");
            $statement->bindParam(":cod_depto", $cod_depto);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function stats_normas() {
            $statement = $this->PDO->prepare("SELECT nomb_norma, count(codigo_ies_padre) as cantidad from inst_por_municipio i
            inner join norma_creacion n on n.cod_norma=i.cod_norma group by nomb_norma,i.cod_norma
            ");
            return ($statement->execute()) ? $statement->fetchAll() : false;
            }
        
    }
?>