<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
?>
<?php
$controller = new InstitucionesController;
$result = $controller->cobertura($_POST['departamento'], $_POST['municipio']);
if (is_array($result) && !empty($result)) {
    echo "<table>
            <tr>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Norma</th>
                <th>Fecha de Creación</th>
                <th>Programas Vigentes</th>
                <th>Acreditada</th>
                <th>Fecha de Acreditación</th>
                <th>Resolución de Acreditación</th>
                <th>Vigencia</th>
                <th>NIT</th>
                <th>Página Web</th>
                <th>Institución</th>
                <th>Ciudad</th>
                <th>Departamento</th>
            </tr>";

    foreach ($result as $row) {
        echo "<tr>
                <td>".$row['direccion']."</td>
                <td>".$row['telefono']."</td>
                <td>".$row['norma']."</td>
                <td>".$row['fecha_creacion']."</td>
                <td>".$row['programas_vigente']."</td>
                <td>".$row['acreditada']."</td>
                <td>".$row['fecha_acreditacion']."</td>
                <td>".$row['resolucion_acreditacion']."</td>
                <td>".$row['vigencia']."</td>
                <td>".$row['nit']."</td>
                <td>".$row['pagina_web']."</td>
                <td>".$row['nomb_inst']."</td>
                <td>".$row['nomb_munic']."</td>
                <td>".$row['nomb_depto']."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados";
}


?>
