<?php
require_once "/opt/lampp/htdocs/proyecto_bases/config/db.php";

    class DirectivosModel{
        private $PDO;

        public function __construct()
        {
            $db= new db();
            $this->PDO= $db->conexion();
        }
        public function index(){
            $stament=$this->PDO->prepare("SELECT *from directivos");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function show($cod_directivo){
            $stament= $this->PDO->prepare("SELECT *FROM directivos where cod_directivo=:cod_directivo limit 1");
            $stament->bindParam(":cod_directivo",$cod_directivo);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function update($cod_directivo,$nomb_directivo,$apell_directivo)
        {
            $stament = $this->PDO->prepare("UPDATE directivos SET nomb_directivo=:nomb_directivo,apell_directivo=:apell_directivo WHERE cod_directivo=:cod_directivo");
            $stament->bindParam(":nomb_directivo",$nomb_directivo);
            $stament->bindParam(":apell_directivo",$apell_directivo);
            $stament->bindParam(":cod_directivo",$cod_directivo);
            return ($stament->execute()) ? $cod_directivo : false;
        }
        public function generarReporteDirectivos($codigo_ies_padre, $fecha_inicio, $fecha_final) {
            $stament= $this->PDO->prepare("SELECT 
            r.cod_directivo,
            concat(nomb_directivo,' ',apell_directivo) as nomb_directivo,
            nomb_inst,
            nomb_cargo,
            nomb_nombram,
            fecha_inicio,
            fecha_final,
            r.cod_munic,
            r.cod_inst,
            r.cod_directivo,
            r.cod_cargo,
            m.nomb_munic

        from rectoria r
        join directivos on directivos.cod_directivo=r.cod_directivo
        join cargos on cargos.cod_cargo=r.cod_cargo
        join acto_nombramiento on acto_nombramiento.cod_nombram=r.cod_nombram
        join inst_por_municipio on inst_por_municipio.cod_inst=r.cod_inst
        join instituciones on instituciones.codigo_ies_padre=inst_por_municipio.codigo_ies_padre
        join municipio m on m.cod_munic=r.cod_munic
        where instituciones.codigo_ies_padre=:codigo_ies_padre and fecha_inicio>=:fecha_inicio 
        and fecha_final<=:fecha_final");
        $stament->bindParam(":codigo_ies_padre",$codigo_ies_padre);
        $stament->bindParam(":fecha_inicio",$fecha_inicio);
        $stament->bindParam(":fecha_final",$fecha_final);

        return ($stament->execute()) ? $stament->fetchAll() : false;
        }
    }
?>