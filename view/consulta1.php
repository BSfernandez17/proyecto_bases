<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
$obj= new InstitucionesController;
$date=$obj->NombreInstitunciones();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario Reporte de Directivos</title>
</head>
<body>
    <h1>Generar Reporte de Directivos</h1>
    <form action="generar-reporte.php" class="form-label" method="POST">
        <label for="codigo_institucion" class="form-label">Institución:</label>
        
        <select name="codigo_ies_padre" required class="form-control">
        <?php foreach($date as $rows) :?>    
        <option value="<?=$rows[0]?>"><?=$rows[1]?></option>    
        <?php endforeach; ?>
    </select>
    
        <label for="fecha_inicio" class="form-label">Fecha Inicial:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required class="form-control"><br><br>

        <label for="fecha_final">Fecha Final:</label>
        <input type="date" id="fecha_final" name="fecha_final" required class="form-control"><br><br>

        <input type="submit" class="btn btn-primary" value="Generar Reporte">
    </form>
</body>
</html>

<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>