<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>
</head>
<body>

<div class="header">

    <a href="../../index.php" class="home-btn" title="Inicio">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill=" rgb(0, 0, 0)" viewBox="0 0 24 24">
            <path d="M12 3l10 9h-3v9h-6v-6H11v6H5v-9H2z"/>
        </svg>
    </a>

    <h2>Notas de los estudiantes</h2>

</div>


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

        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['modulo']; ?></td>
            <td><?= $row['nota1']; ?></td>
            <td><?= $row['nota2']; ?></td>
            <td><?= $row['tarea']; ?></td>
            <td><?= $row['promedio']; ?></td>
        </tr>
</table>

</body>
</html>
