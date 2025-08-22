<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php?mensaje=MetodoInvalido');
    exit;
}
$id = $_POST['id'] ?? '';
if (!$id) {
    header('Location: ../index.php?mensaje=NoID');
    exit;
}
include_once "Conexion.php";
$pdo = (new Conexion())->conectar();
if (!$pdo) {
    header('Location: ../index.php?mensaje=SinConexion');
    exit;
}
try {
    $stmt = $pdo->prepare('DELETE FROM registropersonas WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        header('Location: ../index.php?success=3');
    } else {
        header('Location: ../index.php?mensaje=NoExiste');
    }
} catch (Throwable $e) {
    header('Location: ../index.php?mensaje=Error');
}
exit;