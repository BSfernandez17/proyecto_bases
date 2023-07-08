<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
$obj=new InstitucionesController;
$municipios= $obj->getMunicipio();
?>
<h2>Generar Reporte de Instituciones por Acto Administrativo</h2>
<div class="mb-3"></div>
    <form  action="reporte_acto_admon.php" method="POST">
    <label for="codigo_institucion" class="form-label">Municipio:</label>
        
        <select name="municipio" required class="form-control">
        <?php foreach($municipios as $rows) :?>    
        <option value="<?=$rows[1]?>"><?=$rows[1]?></option>    
        <?php endforeach; ?>
    </select>
        <br><br>
        <input type="submit" class="btn btn-primary" value="Generar Reporte">
    </form>
</div>
<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>