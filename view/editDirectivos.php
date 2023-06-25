<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
require_once "/opt/lampp/htdocs/proyecto_bases/controller/DirectivosController.php";
if(isset($_GET['cod_directivo'])){
    $obj=new DirectivosController();
    $directivo=$obj->show($_GET['cod_directivo']);
}
else{
    echo "HUBO UN ERROR :(";
    exit;
}
?>
<form action="updateDirectivos.php" method="POST">
    <h2>MODIFICANDO REGISTRO</h2>
 <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">codigo Directivo</label>
    <div class="col-sm-10">
      <input type="text" name="cod_directivo" readonly class="form-control-plaintext" id="staticEmail" value="<?= $directivo[0]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="text" class="col-sm-2 col-form-label">NOMBRE</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nomb_directivo" id="inputPassword" value="<?= $directivo[1] ?>">
    </div>
    <div class="mb-3 row">
    <label for="text" class="col-sm-2 col-form-label">Apellido</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="apell_directivo" id="inputPassword" value="<?= $directivo[2] ?>">
    </div>
  </div>
  <div>
  <input type="submit" class="btn btn-success" value="ACTUALIZAR">
  <a class="btn btn-danger"href="showDirectivo.php?id=<?= $directivo [0]?>">CANCELAR</a>
  </div>
 </form>
 <?php
 require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>