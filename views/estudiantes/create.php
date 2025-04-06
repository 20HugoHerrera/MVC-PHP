<form action="../../controllers/EstudianteController.php" method="POST" class="form-container">
    <h2>Agregar Estudiante</h2>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required class="form-input"><br>

    <label for="carnet">Carnet:</label>
    <input type="text" id="carnet" name="carnet" required class="form-input"><br>

    <label for="carrera">Carrera:</label>
    <input type="text" id="carrera" name="carrera" required class="form-input"><br>

    <label for="fecha_registro">Fecha de Registro:</label>
    <input type="date" id="fecha_registro" name="fecha_registro" required class="form-input" value="<?php echo date('Y-m-d'); ?>"><br>

    <input type="submit" value="Guardar" class="submit-btn">
</form>

<!-- Botón Home -->
<a href="../../index.php" class="home-btn">Inicio</a>

<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #f0f4ff, rgb(245, 230, 244));
        color: #333;
        padding: 40px;
        position: relative; /* Esto es necesario para posicionar el botón en la esquina */
    }

    .form-container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        text-align: left;
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
    }

    .form-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-input:focus {
        border-color: rgb(153, 52, 173);
        outline: none;
    }

    .submit-btn {
        width: 100%;
        padding: 10px 20px;
        background-color: rgb(153, 47, 253);
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 5px;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: rgb(70, 39, 99);
    }

    /* Estilo del botón Home en la esquina superior izquierda */
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

    .home-btn:hover {
        background-color: rgba(153, 52, 173, 0.1);
    }
</style>
