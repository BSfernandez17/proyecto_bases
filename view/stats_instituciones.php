<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";

$obj = new InstitucionesController;
$municipios = $obj->municipio_por_departamento($_POST['cod_depto']);
$cantidad_instituciones=$obj->contar_instituciones_por_municipio($_POST['cod_depto']);
?>
<style type="text/CSS">
    .chartBox {
        width: 700px;
    }
</style>
<div class="chatrBox">
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    const municipios = <?php echo json_encode($municipios); ?>; // Se asigna el resultado de json_encode a la variable 'instituciones'
    const instituciones=<?php echo json_encode($cantidad_instituciones); ?>;
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels:  municipios, // Se utiliza la variable 'instituciones' en las etiquetas del gráfico
            datasets: [{
                label: 'CANTIDAD DE INSTITUCIONES',
                data: instituciones,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php"; ?>
