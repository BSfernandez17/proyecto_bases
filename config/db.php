<?php
class db {
    private $host = "localhost";
    private $dbname = "proyecto_bases";
    private $user = "postgres";
    private $password = "postgres";

    public function conexion() {
        try {
            $conexion = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);

            return $conexion;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}

?>
