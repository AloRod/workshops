<?php
include('../utils/functions.php');

$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$province_id = $_POST['province_id'];
$role = $_POST['role'];
$status = $_POST['status'];
$password = $_POST['password'] ?? null; // Contraseña opcional

// Si se ingresó una nueva contraseña, se debe actualizar el hash
if (!empty($password)) {
    $password_hash = md5($password); // Cambia esto si deseas usar un mejor hash
    $sql = "UPDATE users SET firstName = ?, lastName = ?, province_id = ?, role = ?, status = ?, password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $firstName, $lastName, $province_id, $role, $status, $password_hash, $email);
} else {
    // Si no se cambia la contraseña
    $sql = "UPDATE users SET firstName = ?, lastName = ?, province_id = ?, role = ?, status = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $firstName, $lastName, $province_id, $role, $status, $email);
}

// Ejecutar la consulta
if ($stmt->execute()) {
    // Redirige o muestra un mensaje de éxito
    header("Location: ../success.php");
} else {
    echo "Error al actualizar el usuario.";
}

// Cierra la conexión
$stmt->close();
$conn->close();
?>
