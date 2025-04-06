<?php
require_once "../../config/database.php";
require_once "../../models/Estudiante.php";

$database = new Database();
$db = $database->getConnection();
$estudiante = new Estudiante($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM estudiantes WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estudiante->id = $_POST['id'];
    $estudiante->nombre = $_POST['nombre'];
    $estudiante->carnet = $_POST['carnet'];
    $estudiante->carrera = $_POST['carrera'];
    $estudiante->fecha_registro = $_POST['fecha_registro'];
    
    if ($estudiante->update()) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f2f2;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        form {
            background-color: #fff;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: rgb(153, 52, 173);
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"] {
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
            background-color:rgb(102, 33, 116);
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
    <h2>👨‍🎓 Editar Estudiante</h2>

    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $data['nombre'] ?>" required>

    <label>Carnet:</label>
    <input type="text" name="carnet" value="<?= $data['carnet'] ?>" required>

    <label>Carrera:</label>
    <input type="text" name="carrera" value="<?= $data['carrera'] ?>" required>

    <label>Fecha de Registro:</label>
    <input type="date" name="fecha_registro" value="<?= $data['fecha_registro'] ?>" required>

    <input type="submit" value="Actualizar">
    <a href="index.php" class="back-link">⬅ Volver a la lista</a>
</form>
<a href="../../index.php" class="home-btn">Inicio</a>

</body>
</html>
