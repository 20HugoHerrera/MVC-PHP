<?php
require_once "../../config/database.php";
require_once "../../models/Estudiante.php";
require_once "../../models/Nota.php"; // Incluir el modelo de Nota

$database = new Database();
$db = $database->getConnection();
$estudiante = new Estudiante($db);
$nota = new Nota($db); // Crear una instancia de Nota

// Obtener lista de estudiantes
$resultado = $estudiante->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
    <style>
        /* Estilos de la página */
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f0f4ff, rgb(245, 230, 244)); /* Fondo inicial */
            color: #333;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h2 {
            color: rgb(0, 0, 0);
            background-color: rgba(131, 0, 253, 0);
            padding: 10px 15px;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            text-align: center;
            width: fit-content;
            flex-grow: 1;
        }

        a {
            color: rgb(43, 43, 43);
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: none;
            color: rgb(75, 74, 75);
        }

        .home-btn {
            display: inline-block;
            padding: 10px;
            border: 2px solid rgb(153, 52, 173);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            transition: background 0.3s ease;
        }

        .home-btn:hover {
            background-color: rgba(153, 52, 173, 0.1);
        }

        .add-btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            background-color: rgb(153, 47, 253);
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 5px;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .add-btn:hover {
            background-color: rgb(70, 39, 99);
            text-decoration: none;
            color: white;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #d0d6e1;
            text-align: center;
        }

        th {
            background-color: rgb(153, 47, 253);
            color: white;
        }

        tr:nth-child(even) {
            background-color: rgba(240, 244, 255, 0.7);
        }

        tr:hover {
            background-color: rgba(171, 139, 192, 0.4);
            color: black;
        }

        .actions a {
            color: rgb(17, 14, 1);
        }

        .actions a:hover {
            color:rgb(52, 54, 53);
        }
    </style>
</head>
<body>

<div class="header">
    <!-- Botón "Inicio" alineado a la izquierda -->
    <a href="../../index.php" class="home-btn" title="Inicio">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill=" rgb(0, 0, 0)" viewBox="0 0 24 24">
            <path d="M12 3l10 9h-3v9h-6v-6H11v6H5v-9H2z"/>
        </svg>
    </a>

    <!-- Título "Lista de Estudiantes" centrado -->
    <h2>Lista de Estudiantes</h2>
</div>

<!-- Botón "Agregar Estudiante" -->
<a href="create.php" class="add-btn">Agregar Estudiante</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Carnet</th>
        <th>Carrera</th>
        <th>Fecha Registro</th>
        <th>Promedio de Nota</th>
        <th>Acciones</th>
    </tr>
    <?php if ($resultado->rowCount() > 0) : ?>
        <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : 
            // Obtenemos las notas del estudiante
            $notas = $nota->getNotasByEstudianteId($row['id']);
            $promedio = 'Sin notas';
            if ($notas->rowCount() > 0) {
                $nota_row = $notas->fetch(PDO::FETCH_ASSOC);
                $promedio = $nota_row['promedio'];
            } else {
                $promedio = '<a href="../notas/create.php?id=' . $row['id'] . '">Agregar Nota</a>';
            }
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nombre']; ?></td>
                <td><?= $row['carnet']; ?></td>
                <td><?= $row['carrera']; ?></td>
                <td><?= $row['fecha_registro']; ?></td>
                <td><?= $promedio; ?></td>
                <td class="actions">
                    <a href="edit.php?id=<?= $row['id']; ?>">✏️ Editar</a> | 
                    <a href="../../controllers/EstudianteController.php?delete=<?= $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">🗑️ Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else : ?>
        <tr>
            <td colspan="7" style="text-align: center;">No hay registros de estudiantes</td>
        </tr>
    <?php endif; ?>
</table>


</body>
</html>
