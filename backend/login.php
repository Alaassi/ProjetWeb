<?php
header('Content-Type: application/json');

$host = 'localhost';
$db = 'projet_web_dynamiques';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$password = $data['password'];

$stmt = $conn->prepare('SELECT id, username FROM users WHERE email = ? AND password = ?');
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result
