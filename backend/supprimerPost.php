<?php
// supprimerPost.php
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

$stmt = $conn->prepare('DELETE FROM posts WHERE id = ?');
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Publication supprimée avec succès']);
} else {
    echo json_encode(['message' => 'Erreur lors de la suppression de la publication']);
}

$stmt->close();
$conn->close();
?>
