
<?php
include_once "Conexion.php";
$conexion = (new Conexion())->conectar();
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$cedula = $_POST['id'] ?? '';
$correo = $_POST['correo'] ?? '';
$edad = $_POST['edad'] ?? '';
$tel = $_POST['tel'] ?? '';
if ($conexion) {
    try {
        $consulta = "INSERT INTO registropersonas(Id, Nombre, Apellido, Edad, Correo, Telefono) VALUES (:id, :nombre, :apellido, :edad, :correo, :telefono)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $cedula);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $tel);
        $stmt->execute();
        header("Location: ../index.php?success=1");
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            header("Location: ../index.php?mensaje=Duplicado");
        } else {
            header("Location: ../index.php?mensaje=Error");
        }
    }
} else {
    header("Location: ../index.php?mensaje=SinConexion");
}
exit;
