<?php
// Запустите один раз этот скрипт для добавления админа
$pdo = new PDO('mysql:host=localhost;dbname=Atelier;charset=utf8', 'root', '');

$username = 'admin';
$password = password_hash('admin', PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO admin_users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $password]);

echo "Admin user created.";
?>
