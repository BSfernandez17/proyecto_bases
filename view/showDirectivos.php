<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/DirectivosController.php";
    $obj=new DirectivosController();
    $date=$obj->show($_GET['cod_directivo']);
?>
<h2 class="text-center">DETALLES DEL RESGISTRO</h2>

<table class="table container-fluid">
        <thead>
            <tr>
                <th scocpe="col">CODIGO DIRECTIVO</th>
                <th scocpe="col">NOMBRE</th>
                <th scocpe="col">APELLIDO</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col"><?= $date[0]?></td>
                <td scope="col"><?= $date[1]?></td>
                <td scope="col"><?= $date[2]?></td>
            </tr>
        </tbody>
</table>
<div class="pb-3">
    <a href="Directivos.php"class="btn btn-primary">REGRESAR</a>
    <a href="editDirectivos.php?cod_directivo=<?= $date[0]?>"class="btn btn-success">modificar</a>
</div>
<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>