<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
?>
<h2>Generar Reporte de Instituciones por Acto Administrativo</h2>
    <form  action="reporte_acto_admon.php" method="POST">
        <label for="municipio">municipio:</label>
        <input type="text" name="municipio" id="ciudad" required>
        <br><br>
        <input type="submit" value="Generar Reporte">
    </form>

<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>