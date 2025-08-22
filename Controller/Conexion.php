<?php
class Conexion {
    public function conectar() {
        include_once "Configuracion.php";
        try {
            $con = new PDO("mysql:host=".HOST.";dbname=".DB.";charset=utf8", USUARIO, CLAVE);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $ex) {
            echo "Error de conexión a la base de datos: " . $ex->getMessage();
            return null;
        }
    }
}