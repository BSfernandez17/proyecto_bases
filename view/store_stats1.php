<?php require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
$obj= new InstitucionesController;
$departamentos= $obj->getDepartamento();
?>
    <form  action="stats_programas.php" class="form-label" method="POST">
    <label for="codigo_institucion">Municipio:</label>
        
        <select name="cod_depto" required class="form-control">
        <?php foreach($departamentos as $rows) :?>    
        <option value="<?=$rows[0]?>"><?=$rows[1]?></option>    
        <?php endforeach; ?>
    </select>
        <br><br>
        <input type="submit" class="btn btn-primary" value="Generar Estadistica">
    </form>

<?php require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php"; ?>