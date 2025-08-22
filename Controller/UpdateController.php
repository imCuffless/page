<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php");
    exit;
}

$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$edad = $_POST['edad'] ?? '';
$correo = $_POST['correo'] ?? '';
$tel = $_POST['tel'] ?? '';
if (!$id || !$nombre || !$apellido || !$edad || !$correo || !$tel) {
    header("Location: ../update.php?id=$id&mensaje=Incompleto");
    exit;
}

include_once "Conexion.php";
$conexion = (new Conexion())->conectar();
if ($conexion) {
    try {
        $sql = "UPDATE registropersonas SET Nombre = :nombre, Apellido = :apellido, Edad = :edad, Correo = :correo, Telefono = :telefono WHERE Id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $tel);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            header("Location: ../index.php?success=2");
        } else {
            header("Location: ../index.php?mensaje=SinCambios");
        }
    } catch (PDOException $e) {
        header("Location: ../index.php?mensaje=Error");
    }
} else {
    header("Location: ../index.php?mensaje=SinConexion");
}
exit;