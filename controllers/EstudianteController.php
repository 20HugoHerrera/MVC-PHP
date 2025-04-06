 
<?php
require_once "../config/database.php";
require_once "../models/Estudiante.php";

$database = new Database();
$db = $database->getConnection();
$estudiante = new Estudiante($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estudiante->nombre = $_POST['nombre'];
    $estudiante->carnet = $_POST['carnet'];
    $estudiante->carrera = $_POST['carrera'];
    $estudiante->fecha_registro = $_POST['fecha_registro'];
    if ($estudiante->create()) {
        header("Location: ../views/estudiantes/index.php");
    }
}

// Si la URL tiene `?delete=ID`, eliminar la nota
if (isset($_GET['delete'])) {
    $estudiante->id = $_GET['delete'];

    if ($estudiante->delete()) {
        header("Location: ../views/estudiantes/index.php?deleted=1");
        exit();
    } else {
        echo "Error al eliminar la nota.";
    }
}
?>
