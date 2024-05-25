<?php
// ajouterPost.php
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

$title = $data['title'];
$content = $data['content'];
$category = $data['category'];
$author = $data['author'];

$stmt = $conn->prepare('INSERT INTO posts (title, content, category, author) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $title, $content, $category, $author);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Publication créée avec succès']);
} else {
    echo json_encode(['message' => 'Erreur lors de la création de la publication']);
}

$stmt->close();
$conn->close();
?>
