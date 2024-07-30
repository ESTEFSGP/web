<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root"; // Cambia esto si tienes otro usuario configurado
$password = ""; // Cambia esto si tienes una contraseña configurada
$dbname = "formularios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Preparar y ejecutar consulta
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['email'] = $email;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
}

$stmt->close();
$conn->close();
?>
