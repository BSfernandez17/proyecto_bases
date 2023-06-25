<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/DirectivosController.php";
$obj=new DirectivosController();
$rows= $obj->index();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">CODIGO DIRECTIVO</th>
            <th scope="col">NOMBRE </th>
            <th scope="col">APELLIDO</th>
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
                    <th> 
                        <a href="showDirectivos.php?cod_directivo=<?= $row[0]?>"class="btn btn-primary">ver</a>
                        <a href="editDirectivos.php?cod_directivo=<?= $row[0]?> "class="btn btn-success">MODIFICAR</a>
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