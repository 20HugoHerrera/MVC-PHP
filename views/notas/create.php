<?php
require_once "../../config/database.php";
require_once "../../models/Estudiante.php";

$database = new Database();
$db = $database->getConnection();
$estudiante = new Estudiante($db);

// Obtener lista de estudiantes
$estudiantes = $estudiante->read();
?>

<form action="../../controllers/NotaController.php" method="POST" class="form-container">
    <h2>Agregar Nota</h2>

    <label for="id_estudiante">Estudiante:</label>
    <select name="id_estudiante" id="id_estudiante" required class="form-input">
        <option value="">Selecciona un estudiante</option>
        <?php
        while ($row = $estudiantes->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . " (" . $row['carnet'] . ")</option>";
        }
        ?>
    </select><br>

    <label for="modulo">Módulo:</label>
    <input type="text" id="modulo" name="modulo" required class="form-input"><br>

    <label for="nota1">Nota 1:</label>
    <input type="number" id="nota1" name="nota1" step="0.1" required class="form-input"><br>

    <label for="nota2">Nota 2:</label>
    <input type="number" id="nota2" name="nota2" step="0.1" required class="form-input"><br>

    <label for="tarea">Tarea:</label>
    <input type="number" id="tarea" name="tarea" step="0.1" required class="form-input"><br>

    <input type="submit" value="Guardar" class="submit-btn">
</form>

<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #f0f4ff, rgb(245, 230, 244)); /* Fondo inicial */
        color: #333;
        padding: 40px;
    }

    .form-container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        text-align: left; /* Los labels ya no están centrados */
    }

    h2 {
        color: rgb(0, 0, 0);
        background-color: rgba(131, 0, 253, 0); /* Fondo morado */
        padding: 10px 15px;
        border-radius: 8px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0 0 20px 0;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: rgb(0, 0, 0);
        list-style: none; /* Quitar los puntos del label */
    }

    .form-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form-input:focus {
        border-color: rgb(153, 52, 173); /* Morado al enfocar el campo */
        outline: none;
    }

    .submit-btn {
        width: 100%;
        padding: 10px 20px;
        background-color: rgb(153, 47, 253); /* Morado de fondo */
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 5px;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: rgb(70, 39, 99); /* Morado más oscuro al hacer hover */
    }
</style>
