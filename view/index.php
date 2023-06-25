<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
$obj=new InstitucionesController();
$rows= $obj->index();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Cod_ies_padre</th>
            <th scope="col">NOMBRE INSTITUCION</th>
            <th scope="col">SECTOR</th>
            <th scope="col">CARACTER ACADEMICO</th>
            <th scope="col">ACCION</th>
        </tr>
    </thead>
    <tbody>
        <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th><?= $row[0]  ?></th>
                    <th><?= $row[1]  ?></th>
                    <th><?= $row[2]  ?></th>
                    <th><?= $row[3]  ?></th>
                    <th> 
                        <a href="showInstitucion.php?codigo_ies_padre=<?= $row[0]?>"class="btn btn-primary">ver</a>
                        <a href="editInstitucion.php?codigo_ies_padre=<?= $row[0]?> "class="btn btn-success">MODIFICAR</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else:  ?>
            <tr>
                <td colspan="3" class="tex-center">NO HAY REGISTROS</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
 <?php
 require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
 ?>