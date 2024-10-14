<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'bdworkshop4';
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $input_password = $_POST['password'];

    // Prepara la consulta para verificar el usuario y su estado
    $sql = "SELECT password, status FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica si el usuario existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_hash = $user['password'];
        $status = $user['status'];

        // Genera el hash MD5 de la contraseña ingresada (aunque se recomienda usar un hash más seguro como bcrypt)
        $input_hash = md5($input_password);

        // Compara el hash generado con el hash almacenado y verifica el estado del usuario
        if ($input_hash === $stored_hash) {
            if ($status === 'active') {
                // Actualiza el campo last_login_datetime con la hora actual
                $current_timestamp = date('Y-m-d H:i:s');
                $update_sql = "UPDATE users SET last_login_datetime = ? WHERE email = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("ss", $current_timestamp, $email);
                $update_stmt->execute();

                // Redirigir al dashboard o página de éxito
                header("Location: ../dashboard.php");
                exit();
            } else {
                // Usuario está inactivo
                $error_msg = "Tu cuenta está inactiva. Contacta con soporte.";
                header("Location: ../login.php?error=" . urlencode($error_msg));
                exit();
            }
        } else {
            // Contraseña incorrecta
            $error_msg = "Contraseña incorrecta.";
            header("Location: ../login.php?error=" . urlencode($error_msg));
            exit();
        }
    } else {
        // Usuario no encontrado
        $error_msg = "No se encontró una cuenta con ese correo.";
        header("Location: ../login.php?error=" . urlencode($error_msg));
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
