<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'bdworkshop4'; // Cambia esto si el nombre de tu base de datos es diferente
$conn = new mysqli($host, $user, $password, $db);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $province_id = $_POST['province_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validaciones básicas (ejemplo)
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($role)) {
        $error_msg = "Por favor completa todos los campos.";
        header("Location: ../signup.php?error=" . urlencode($error_msg));
        exit();
    }

    // Encriptar la contraseña (recomiendo usar password_hash en lugar de md5)
    $passwordHash = md5($password); // Puedes cambiar a password_hash($password, PASSWORD_DEFAULT)

    // Prepara la consulta de inserción
    $sql = "INSERT INTO users (firstName, lastName, province_id, email, password, role, status) 
            VALUES (?, ?, ?, ?, ?, ?, 'active')";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssss", $firstName, $lastName, $province_id, $email, $passwordHash, $role);
        $stmt->execute();

        // Redirigir a una página de éxito o login
        header("Location: ../login.php");
        exit();
    } else {
        $error_msg = "Error en la preparación de la consulta: " . $conn->error;
        header("Location: ../signup.php?error=" . urlencode($error_msg));
        exit();
    }
}

// Cierra la conexión
$conn->close();
?>
