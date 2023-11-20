<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alquiler</title>
    <style>
        form div {
            padding: 10px 5px;
        }

        form label {
            min-width: 150px;
            display: inline-block;
        }
    </style>
</head>
<body>

    <h2>Formulario de Alquiler</h2>

    <form action="formulario.php" method="post">

    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
    </div>
    <div>
        <label for="libro">Libro:</label>
        <input type="text" id="libro" name="libro" required>
    </div>
    <div>
        <label for="libro">ISBN:</label>
        <input type="number" id="isbn" name="isbn" minlength="13" maxlength="13" required>
    </div>
   
    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
    </div>
    <div>
        <label for="fecha_alquiler">Fecha Alquiler:</label>
        <input type="date" id="fecha_alquiler" name="fecha_alquiler" required>
    </div>
    <div>
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
    </div>
    <div>
        <input type="submit" value="Enviar">
    </div>
    </form>

</body>
</html>
