<?php
    require_once("/opt/lampp/htdocs/proyecto_bases/controller/InstitucionesController.php");
    $obj = new InstitucionesController();
    $date = $obj->mostrar($_GET['codigo_ies_padre']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Registro</title>
    <link rel="stylesheet" type="text/css" href="layouts/style.css">
    <style>
        /* Form Styles */
        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 12px;
        }

        input[type="submit"],
        input[type="button"],
        button[type="submit"],
        button[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 8px;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover,
        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Modificar Registro</h2>
    
    <?php
        $nombre_institucion = $date[1];
        $sector = $date[2];
        $nombre_academico = $date[3];
    ?>
    
    <form action="store.php" method="POST" autocomplete="off">
        <label for="nombre_institucion">Nombre de la Institución:</label>
        <input type="text" id="nomb_inst" name="nomb_inst" value="<?php echo $nombre_institucion; ?>">
        
        <label for="sector">Sector:</label>
        <input type="text" id="sector" name="cod_sector" value="<?php echo $sector; ?>">
        
        <label for="nombre_academico">Nombre Académico:</label>
        <input type="text" id="nombre_academico" name="cod_academ" value="<?php echo $nombre_academico; ?>">
        
        <button type="submit">MODIFICAR</button>
    </form>
    <button type="button" onclick="window.location.href='show.php?id=<?= $date [0]?>'">CANCELAR</button>
</body>
</html>


