<?php
// modifierPost.php
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

$id = $data['id'];
$title = $data['title'];
$content = $data['content'];
$category = $data['category'];

$stmt = $conn->prepare('UPDATE posts SET title = ?, content = ?, category = ? WHERE id = ?');
$stmt->bind_param('sssi', $title, $content, $category, $id);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Publication modifiée avec succès']);
} else {
    echo json_encode(['message' => 'Erreur lors de la modification de la publication']);
}

$stmt->close();
$conn->close();
?>
