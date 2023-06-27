<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
?>
<body>
    <h2>Consulta de Cobertura de Instituciones</h2>
    <form action="cobertura.php" method="POST">
        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento" required>
        <br><br>
        <label for="municipio">municipio:</label>
        <input type="text" id="municipio" name="municipio" required>
        <br><br>
        <input type="submit" value="Consultar">
    </form>
<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>