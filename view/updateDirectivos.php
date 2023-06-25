<?php
require_once "/opt/lampp/htdocs/proyecto_bases/controller/DirectivosController.php";
$obj = new DirectivosController();
$obj->update($_POST['cod_directivo'], $_POST['nomb_directivo'], $_POST['apell_directivo']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Alerta de modificación exitosa</title>
    <style>
        .alert {
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        .button {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="alert">
        <strong>Modificaciones guardadas con éxito!</strong>
    </div>
    <a href="index.php" class="button">Inicio</a>
</body>
</html>
