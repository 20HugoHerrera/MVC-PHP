<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Estudiantes y Notas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f9f1;
            color: rgb(0, 0, 0);
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: rgb(157, 11, 255);
            color: white;
            padding: 20px;
            margin: 0;
        }
        nav {
            background-color: rgba(184, 95, 243, 0.26);
            padding: 15px;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            color: rgb(0, 0, 0);
        }
        nav a:hover {
            text-decoration: none;
        }
        p {
            padding: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 280px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin-top: 0;
            color: rgb(157, 11, 255);
        }
        .card p {
            padding: 0;
            margin: 10px 0 0 0;
        }
    </style>
</head>
<body>

    <h1>Bienvenido al Sistema de Gestión</h1>

    <nav>
        <a href="views/estudiantes/index.php">📚 Estudiantes</a>
        <a href="views/notas/index.php">📝 Notas</a>
    </nav>

    <p>Selecciona una opción del menú para gestionar estudiantes o notas.</p>

    <div class="container">
        <div class="card">
            <h3>Curso de Matemáticas</h3>
            <p>Accede a los contenidos, tareas y exámenes del curso de Matemáticas.</p>
        </div>
        <div class="card">
            <h3>Curso de Historia</h3>
            <p>Consulta el material, fechas importantes y trabajos del curso de Historia.</p>
        </div>
        <div class="card">
            <h3>Curso de Programación</h3>
            <p>Aprende lógica, algoritmos y desarrolla tus habilidades en programación.</p>
        </div>
        <div class="card">
            <h3>Ayuda y Soporte</h3>
            <p>¿Tienes dudas? Consulta nuestra sección de preguntas frecuentes.</p>
        </div>
    </div>

</body>
</html>
