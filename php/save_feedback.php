<?php
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "Atelier";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения к базе: ' . $conn->connect_error]);
    exit;
}
$conn->set_charset("utf8mb4");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    if (!$name || !$phone || !$email) {
        echo json_encode(['success' => false, 'message' => 'Пожалуйста, заполните все обязательные поля.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO feedback (name, phone, email, comment, created_at) VALUES (?, ?, ?, ?, NOW())");
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Ошибка подготовки запроса: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("ssss", $name, $phone, $email, $comment);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Спасибо за ваш отзыв!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при сохранении данных: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Неверный метод запроса']);
}
?>