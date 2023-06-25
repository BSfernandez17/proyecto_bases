<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php";
if(isset($_GET['codigo_ies_padre'])){
    $obj=new InstitucionesController();
    $institucion=$obj->mostrar($_GET['codigo_ies_padre']);
}
else{
    echo "HUBO UN ERROR :(";
    exit;
}
?>
<form action="updateInstituciones.php" method="POST">
    <h2>MODIFICANDO REGISTRO</h2>
 <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input type="text" name="codigo_ies_padre" readonly class="form-control-plaintext" id="staticEmail" value="<?= $institucion[0]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="text" class="col-sm-2 col-form-label">NOMBRE</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nomb_inst" id="inputPassword" value="<?= $institucion[1] ?>">
    </div>
    <div class="mb-3 row">
    <label for="text" class="col-sm-2 col-form-label">cod_sector</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cod_sector" id="inputPassword" value="<?= $institucion[2] ?>">
    </div>
    <div class="mb-3 row">
    <label for="text" class="col-sm-2 col-form-label">cod_academ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cod_academ" id="inputPassword" value="<?= $institucion[3] ?>">
    </div>
  </div>
  <div>
  <input type="submit" class="btn btn-success" value="ACTUALIZAR">
  <a class="btn btn-danger"href="show.php?id=<?= $institucion [0]?>">CANCELAR</a>
  </div>
 </form>
 <?php
 require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>