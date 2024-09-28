<?php

// Mostrar los datos que vienen desde el formulario (o URL)
echo("The Name is: " . $_REQUEST['firstName'] . "<br/>"); 
echo("The last name is: " . $_REQUEST['lastName'] . "<br/>");
echo("The address is: " . $_REQUEST['email'] . "<br/>");
echo("The password  is: " . $_REQUEST['password'] . "<br/>");
echo("The province  is: " . $_REQUEST['province'] . "<br/>");


// Datos de conexión a la base de datos
$servername = "alondraworkshop613.com"; //nombre del servidor donde esta mi base de datos. 
$username = "root"; // Nombre de usuario predeterminado de XAMPP
$password = ""; // Generalmente no hay contraseña en XAMPP
$dbname = "bdworkshop3"; //nombre de la base de datos ya creada 

// Crear la conexión utilizando la clase mysqli
$connect = new mysqli($servername, $username, $password, $dbname);


$sql = "INSERT INTO workshop3 (name, lastname, email, password, province) VALUES ('" . $_REQUEST['firstName'] . "', '" . $_REQUEST['lastName'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['password'] . "', '" . $_REQUEST['province'] . "')";


// Ejecutar la consulta para agaregar datos. 
if ($connect->query($sql) === TRUE) {
    echo "Se agregaron los datos correctamente";
} else {
    echo "Error al agregar datos: " . $connect->error;
}

echo '<br/><a href="users.php" class="btn btn-secondary">Ver Usuarios</a>';