<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/DirectivosController.php";

// Verificar si se recibieron los parámetros del formulario
if (isset($_POST['codigo_ies_padre']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])) {
    // Obtener los valores del formulario
    $codigoIesPadre = $_POST['codigo_ies_padre'];
    $fechaInicio = $_POST['fecha_inicio'];
    $fechaFinal = $_POST['fecha_final'];

    // Crear una instancia del controlador de directivos
    $directivosController = new DirectivosController();

    // Obtener los directivos filtrados por institución y rango de fechas
    $directivos = $directivosController->generarReporteDirectivos($codigoIesPadre, $fechaInicio, $fechaFinal);

    // Mostrar los resultados del reporte
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre Directivo</th>
                <th scope="col">CARGO</th>
                <th scope="col">NOMBRAMIENTO</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Final</th>
                <th scope="col">Código de Municipio</th>
                <th scope="col">Institución</th>
                <th scope="col">Nombre Municipio</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($directivos): ?>
                <?php foreach ($directivos as $directivo): ?>
                    <tr>
                        <td><?= $directivo['nomb_directivo'] ?></td>
                        <td><?= $directivo['nomb_cargo'] ?></td>
                        <td><?= $directivo['nomb_nombram'] ?></td>
                        <td><?= $directivo['fecha_inicio'] ?></td>
                        <td><?= $directivo['fecha_final'] ?></td>
                        <td><?= $directivo['cod_munic'] ?></td>
                        <td><?= $directivo['nomb_inst'] ?></td>
                        <td><?= $directivo['nomb_munic'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">NO HAY REGISTROS</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Faltan parámetros requeridos.";
}

require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>
