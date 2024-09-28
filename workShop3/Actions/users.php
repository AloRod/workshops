<?php

// Datos de conexión a la base de datos
$servername = "alondraworkshop613.com"; // nombre del servidor donde está mi base de datos. 
$username = "root"; // Nombre de usuario predeterminado de XAMPP
$password = ""; // Generalmente no hay contraseña en XAMPP
$dbname = "bdworkshop3"; // nombre de la base de datos ya creada 

// Crear la conexión utilizando la clase mysqli
$connect = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM workshop3"; // Asegúrate de que esta tabla exista
$result = $connect->query($sql);

// Comienza la construcción de la tabla HTML
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> <!--framework con componentes predeterminados -->
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Usuarios</h1>
        <table class="table table-bordered">
            <thead>    <!-- Define la cabecera de la tabla. -->
                <tr> <!-- Inicia una fila de la tabla. -->
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>Province</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    // Salida de cada fila
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td> 
                                <td>{$row['lastname']}</td> 
                                <td>{$row['email']}</td> 
                                <td>{$row['province']}</td> 
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$connect->close();
?>
