<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fecha y Hora</title>
</head>
<body>
<?php
// Establecer la zona horaria
date_default_timezone_set('America/Costa_Rica');

// Obtener la fecha y hora actual
$fechaHoraActual = date('Y-m-d H:i:s');

// Mostrar la fecha y hora
echo "Fecha y hora actual: " . $fechaHoraActual;
?>
</body>
</html>
