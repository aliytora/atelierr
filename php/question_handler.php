<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'Atelier';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    // Редирект с ошибкой подключения
    header('Location: ../html/about_us.php?error=' . urlencode('Ошибка подключения к БД'));
    exit;
}
$conn->set_charset('utf8mb4');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    if ($name === '' || $phone === '') {
        header('Location: ../html/about_us.php?error=' . urlencode('Пожалуйста, заполните обязательные поля Имя и Телефон.'));
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO question (name, phone, comment) VALUES (?, ?, ?)");
    if (!$stmt) {
        header('Location: ../html/about_us.php?error=' . urlencode('Ошибка подготовки запроса: ' . $conn->error));
        exit;
    }
    $stmt->bind_param('sss', $name, $phone, $comment);

    if ($stmt->execute()) {
        header('Location: ../html/about_us.php?success=1');
        exit;
    } else {
        header('Location: ../html/about_us.php?error=' . urlencode('Ошибка при сохранении данных: ' . $stmt->error));
        exit;
    }
    $stmt->close();
}
$conn->close();
?>
