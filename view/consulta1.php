<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario Reporte de Directivos</title>
</head>
<body>
    <h1>Generar Reporte de Directivos</h1>
    <form action="generar-reporte.php" method="POST">
        <label for="codigo_institucion">Código de Institución:</label>
        <input type="text" id="codigo_ies_padre" name="codigo_ies_padre" required><br><br>

        <label for="fecha_inicio">Fecha Inicial:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required><br><br>

        <label for="fecha_final">Fecha Final:</label>
        <input type="date" id="fecha_final" name="fecha_final" required><br><br>

        <input type="submit" value="Generar Reporte">
    </form>
</body>
</html>

<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>