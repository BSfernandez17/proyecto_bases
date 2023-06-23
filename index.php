<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Instituciones</title>
    <link rel="stylesheet" type="text/css" href="layouts/style.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Código IES Padre</th>
                <th>Nombre de la Institución</th>
                <th>Sector</th>
                <th>Nombre Académico</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once '/opt/lampp/htdocs/proyecto_bases/config/db.php';
                $db = new db();
                $conexion = $db->conexion();
                try {
                    $query = "SELECT i.codigo_ies_padre, i.nomb_inst, s.nomb_sector, c.nomb_academ
                    FROM instituciones i
                    INNER JOIN sectores s ON i.cod_sector = s.cod_sector
                    INNER JOIN caracter_academico c ON i.cod_academ = c.cod_academ;
                    ";
                    $stmt = $conexion->query($query);
    
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['codigo_ies_padre']."</td>";
                        echo "<td>".$row['nomb_inst']."</td>";
                        echo "<td>".$row['nomb_sector']."</td>";
                        echo "<td>".$row['nomb_academ']."</td>";
                        echo "<td><button class='button-ver'>Ver</button></td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Error de conexión: " . $e->getMessage();
                }
            ?>
        </tbody>
    </table>
</body>
</html>
