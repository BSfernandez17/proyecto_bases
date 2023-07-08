<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";

$obj = new InstitucionesController;
$instituciones = $obj->get_instituciones_por_departamento($_POST['cod_depto']);
$programas_vigentes=$obj->programas_por_departamento($_POST['cod_depto']);
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
    const instituciones = <?php echo json_encode($instituciones); ?>; // Se asigna el resultado de json_encode a la variable 'instituciones'
    const programas=<?php echo json_encode($programas_vigentes); ?>;
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels:  instituciones, // Se utiliza la variable 'instituciones' en las etiquetas del gráfico
            datasets: [{
                label: 'CANTIDAD DE PROGRAMAS',
                data: programas,
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
