<?php 
require_once "../../config/database.php";
require_once "../../models/Nota.php";

$database = new Database();
$db = $database->getConnection();
$nota = new Nota($db);
$resultado = $nota->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f0f4ff, rgb(245, 230, 244)); 
            color: #333;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center; 
        }

        h2 {
            color:rgb(0, 0, 0); 
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
            color:rgb(47, 49, 48); 
        }
    </style>
</head>
<body>

<div class="header">

    <a href="../../index.php" class="home-btn" title="Inicio">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill=" rgb(0, 0, 0)" viewBox="0 0 24 24">
            <path d="M12 3l10 9h-3v9h-6v-6H11v6H5v-9H2z"/>
        </svg>
    </a>

    <h2>Notas de los estudiantes</h2>
    <a href="../estudiantes/index.php" class="add-btn">Ir a lista de estudiantes</a>
</div>

<a href="create.php" class="add-btn">Agregar Nota</a>

<table>
    <tr>
        <th>ID</th>
        <th>Módulo</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Tarea</th>
        <th>Promedio</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['modulo']; ?></td>
            <td><?= $row['nota1']; ?></td>
            <td><?= $row['nota2']; ?></td>
            <td><?= $row['tarea']; ?></td>
            <td><?= $row['promedio']; ?></td>
            <td class="actions">
                <a href="edit.php?id=<?= $row['id']; ?>">✏️ Editar</a> | 
                <a href="../../controllers/NotaController.php?delete=<?= $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta nota?')">🗑️ Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
