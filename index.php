<?php 
require_once "/opt/lampp/htdocs/proyecto_bases/head/head.php";
?>







<style>
section, th{
display: flex ;
justify-content: center;
}
</style>
<section>
<table class="table">
<tbody>
<tr>
<th>
<a href="view/index.php" class="btn btn-primary">INSTITUCIONES</a>
</th>
</tr>
<tr>
<th>
<a href="view/Directivos.php" class="btn btn-primary">DIRECTIVOS</a>
</th>
</tr>
<tr>
<th>
<a href="view/consulta1.php" class="btn btn-primary">Reporte de directivos</a>
</th>
<th>
<a href="view/consulta3.php" class="btn btn-primary">Instituciones por acto de Administrativo</a>
</th>
<th>
<a href="view/consulta2.php" class="btn btn-primary">Cobertura</a>
</th>
<th>
<a href="view/formGrafico1.php" class="btn btn-primary">Estadisticas</a></th>
</tr>
</tbody>
</table>
</section>
<?php
require_once "/opt/lampp/htdocs/proyecto_bases/head/footer.php";
?>
