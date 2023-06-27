<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
$controller= new InstitucionesController;
$nomb_municipio=$_POST['municipio'];
$datos= $controller->Instituciones_por_acto($nomb_municipio);
?>
<?php
if ($datos) {
    echo '<table>
            <thead>
                <tr>
                    <th>Código Institución</th>
                    <th>Nombre Institución</th>
                    <th>Nombre Acto Administrativo</th>
                </tr>
            </thead>
            <tbody>';

    // Recorrer los datos y generar filas de tabla
    foreach ($datos as $dato) {
        echo '<tr>';
        echo '<td>' . $dato['codigo_ies_padre'] . '</td>';
        echo '<td>' . $dato['nomb_inst'] . '</td>';
        echo '<td>' . $dato['nomb_admon'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>
        </table>';
} else {
    echo 'No se encontraron instituciones para el municipio especificado.';
}
?>
<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>    