<?php
require_once "../../config/database.php";
require_once "../../models/Nota.php";

$database = new Database();
$db = $database->getConnection();
$nota = new Nota($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM notas WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota->id = $_POST['id'];
    $nota->modulo = $_POST['modulo'];
    $nota->nota1 = $_POST['nota1'];
    $nota->nota2 = $_POST['nota2'];
    $nota->tarea = $_POST['tarea'];
    $nota->promedio = ($_POST['nota1'] + $_POST['nota2'] + $_POST['tarea']) / 3;
    $nota->id_estudiante = $_POST['id_estudiante'];

    if ($nota->update()) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Nota</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        form {
            background-color: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: rgb(153, 52, 173);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color:rgb(153, 52, 173);
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: rgb(102, 33, 116);
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: rgb(153, 52, 173);
            font-size: 15px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .home-btn {
        position: absolute;
        top: 20px;
        left: 20px;  /* Cambié 'right' por 'left' */
        padding: 10px;
        border: 3px solid rgb(0, 0, 0); /* Morado para los botones */
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.5);
        transition: background 0.3s ease;
        text-decoration: none;
        color: rgb(153, 52, 173);
        font-weight: bold;
    }
    </style>
</head>
<body>

<form action="edit.php" method="POST">
    <h2>✏️ Editar Nota</h2>

    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>ID del Estudiante:</label>
    <input type="number" name="id_estudiante" value="<?= $data['id_estudiante'] ?>" required>

    <label>Módulo:</label>
    <input type="text" name="modulo" value="<?= $data['modulo'] ?>" required>

    <label>Nota 1:</label>
    <input type="number" step="0.1" name="nota1" value="<?= $data['nota1'] ?>" required>

    <label>Nota 2:</label>
    <input type="number" step="0.1" name="nota2" value="<?= $data['nota2'] ?>" required>

    <label>Tarea:</label>
    <input type="number" step="0.1" name="tarea" value="<?= $data['tarea'] ?>" required>

    <input type="submit" value="Actualizar">
    <a href="index.php" class="back-link">⬅ Volver a la lista</a>
</form>
<a href="../../index.php" class="home-btn">Inicio</a>

</body>
</html>
