<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из POST
    $name = trim($_POST['name'] ?? '');
    $surname = trim($_POST['surname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $payment = trim($_POST['payment'] ?? '');
    $delivery = trim($_POST['delivery'] ?? '');
    $size = trim($_POST['size'] ?? '');
    $comments = trim($_POST['comments'] ?? '');
    $productsJson = $_POST['products'] ?? '';

    // Проверяем обязательные поля (подкорректируйте по необходимости)
    if (!$name || !$phone || !$productsJson) {
        die('Заполните обязательные поля и добавьте товары в корзину.');
    }

    // Декодируем JSON с товарами
    $products = json_decode($productsJson, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Ошибка декодирования JSON: ' . json_last_error_msg());
    }
    if (!is_array($products) || count($products) === 0) {
        die('Корзина пуста или данные некорректны.');
    }

    // Извлекаем только названия товаров
    $productNames = [];
    foreach ($products as $product) {
        if (isset($product['name'])) {
            $productNames[] = $product['name'];
        }
    }

    // Объединяем названия в строку с переносами строк
    $productsString = implode("\n", $productNames);

    // Подготавливаем запрос с учётом полей таблицы orders
    $stmt = $conn->prepare("INSERT INTO orders (name, surname, payment, delivery, phone, email, size, comments, products, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    if (!$stmt) {
        die("Ошибка подготовки запроса: " . $conn->error);
    }

    $stmt->bind_param("sssssssss", $name, $surname, $payment, $delivery, $phone, $email, $size, $comments, $productsString);

    if ($stmt->execute()) {
        // Здесь можно добавить дополнительную логику, если нужно
        echo "Заказ успешно оформлен!";
    } else {
        echo "Ошибка при оформлении заказа: " . $stmt->error;
    }
    $stmt->close();
} else {
    die('Неверный метод запроса');
}
?>
