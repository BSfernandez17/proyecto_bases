<?php
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
    $obj=new  InstitucionesController();
    $date=$obj->show($_GET['codigo_ies_padre']);
?>
 <!DOCTYPE html>
<html>
<head>
    <title>Tabla de Instituciones</title>
    <link rel="stylesheet" type="text/css" href="../layouts/style.css">

</head>
<body>
    <h2>DETALLES DEL REGISTRO<h2>
    
    <table>
        <thead>
            <tr>
            <th>codigo_ies_padre</th>
            <th>Nombre de Institucion</th>
            <th>Sector</th>
            <th>Nombre academico</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?= $date[0]?></td>
            <td><?= $date[1]?></td>
            <td><?= $date[2]?></td>
            <td><?= $date[3]?></td>
            </tr>
        </tbody>
    </table>
    <div>
    <a class='button-modificar' href="update.php?codigo_ies_padre=<?=$date[0]?>" >MODIFICAR</a>
    </div>
    </body>
</html>
