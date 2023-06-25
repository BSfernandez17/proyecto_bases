<?php
    require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
    $obj = new InstitucionesController();
    $obj->update($_POST['codigo_ies_padre'],$_POST['nomb_inst'],$_POST['cod_sector'],$_POST['cod_academ']);

?>