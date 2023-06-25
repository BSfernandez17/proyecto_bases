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
        
    }
?>