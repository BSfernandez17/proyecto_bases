<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
    $obj=new InstitucionesController();
    $date=$obj->show($_GET['codigo_ies_padre']);
?>
<h2 class="text-center">DETALLES DEL RESGISTRO</h2>

<table class="table container-fluid">
        <thead>
            <tr>
                <th scocpe="col">CODIGO IES PADRE</th>
                <th scocpe="col">NOMBRE DE INSTITUCION</th>
                <th scocpe="col">SECTOR</th>
                <th scocpe="col">CARACTER ACADEMICO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col"><?= $date[0]?></td>
                <td scope="col"><?= $date[1]?></td>
                <td scope="col"><?= $date[2]?></td>
                <td scope="col"><?= $date[3]?></td>
            </tr>
        </tbody>
</table>
<div class="pb-3">
    <a href="index.php"class="btn btn-primary">REGRESAR</a>
    <a href="editInstitucion.php?codigo_ies_padre=<?= $date[0]?>"class="btn btn-success">modificar</a>
</div>
<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>