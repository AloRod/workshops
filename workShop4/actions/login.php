
<?php
// Conexión a la base de datos 
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'bdworkshop4';

$conn = new mysqli($host, $user, $password, $db);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtén los datos ingresados por el usuario
    $email = $_POST['email'];
    $input_password = $_POST['password'];

    // Prepara una consulta para obtener el hash almacenado
    $sql = "SELECT password FROM users WHERE email = ?";
    
    // Prepara la sentencia
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    
    // Ejecuta la consulta
    $stmt->execute();
    
    // Obtiene el resultado
    $result = $stmt->get_result();
    
    // Verifica si el usuario existe
    if ($result->num_rows > 0) {
        // Obtiene el hash almacenado de la base de datos
        $user = $result->fetch_assoc();
        $stored_hash = $user['password'];  // El hash MD5 almacenado
        
        // Genera el hash MD5 de la contraseña ingresada
        $input_hash = md5($input_password);
        
        // Compara el hash generado con el hash almacenado
        if ($input_hash === $stored_hash) {
            // Login exitoso
            echo "Inicio de sesión exitoso.";
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró una cuenta con ese correo.";
    }

    // Cierra la sentencia
    $stmt->close();
}

// Cierra la conexión
$conn->close();
?>
