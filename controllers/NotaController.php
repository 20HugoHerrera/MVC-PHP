<?php
require_once "../config/database.php";
require_once "../models/Nota.php";

$database = new Database();
$db = $database->getConnection();
$nota = new Nota($db);

// Si el formulario se envió (crear o actualizar una nota)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota->modulo = $_POST['modulo'];
    $nota->nota1 = $_POST['nota1'];
    $nota->nota2 = $_POST['nota2'];
    $nota->tarea = $_POST['tarea'];
    $nota->promedio = ($_POST['nota1'] + $_POST['nota2'] + $_POST['tarea']) / 3;
    $nota->id_estudiante = $_POST['id_estudiante'];

    if ($nota->create()) {
        header("Location: ../views/notas/index.php");
        exit();
    }
}

// Si la URL tiene `?delete=ID`, eliminar la nota
if (isset($_GET['delete'])) {
    $nota->id = $_GET['delete'];

    if ($nota->delete()) {
        header("Location: ../views/notas/index.php?deleted=1");
        exit();
    } else {
        echo "Error al eliminar la nota.";
    }
}
?>
