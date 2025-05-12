<?php
$conn = new mysqli('localhost', 'root', '', 'annotations_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = $_POST['user_input'];
    $annotation = $_POST['annotation'];
    $stmt = $conn->prepare("INSERT INTO annotations (user_input, annotation) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_input, $annotation);
    $stmt->execute();
    echo "Annotation saved successfully!";
    $stmt->close();
}

$conn->close();
?>
