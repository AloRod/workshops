<?php

// Mostrar los datos que vienen desde el formulario (o URL)
echo("The Name is: " . $_REQUEST['name'] . "<br/>"); 
echo("The last name is: " . $_REQUEST['lastName'] . "<br/>");
echo("The phone number is: " . $_REQUEST['phone'] . "<br/>");
echo("The address is: " . $_REQUEST['email'] . "<br/>");


// Datos de conexión a la base de datos
$servername = "alondraworkshop613.com"; //nombre del servidor donde esta mi base de datos. 
$username = "root"; // Nombre de usuario predeterminado de XAMPP
$password = ""; // Generalmente no hay contraseña en XAMPP
$dbname = "bdworkshop2"; //nombre de la base de datos ya creada 

// Crear la conexión utilizando la clase mysqli
$connect = new mysqli($servername, $username, $password, $dbname);


$sql = "INSERT INTO workshop2 (name, lastname, phone, gmail) VALUES ('" . $_REQUEST['name'] . "', '" . $_REQUEST['lastName'] . "', '" . $_REQUEST['phone'] . "', '" . $_REQUEST['email'] . "')";


// Ejecutar la consulta para agaregar datos. 
if ($connect->query($sql) === TRUE) {
    echo "Se agregaron los datos correctamente";
} else {
    echo "Error al agregar datos: " . $connect->error;
}

?>