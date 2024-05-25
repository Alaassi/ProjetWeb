<?php
// signup.php
header('Content-Type: application/json');

$host = 'localhost';
$db = 'projet_web_dynamique';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$password = $data['password'];
$username = $data['username'];

$stmt = $conn->prepare('INSERT INTO users (email, password, username) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $email, $password, $username);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

$stmt->close();
$conn->close();
?>
