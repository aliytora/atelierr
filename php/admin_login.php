<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=Atelier;charset=utf8', 'root', '');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = 'Неверный логин или пароль';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Вход в админку</title>
    <style>
        /* Общие стили страницы */
        body {
            margin: 0;
            padding: 0;
            font-family: AL-Medium, Arial, sans-serif;
            background-color: #F2E9D6;
            color: #633605;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Контейнер формы */
        .login-container {
            background-color: #fff;
            padding: 40px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(99, 54, 5, 0.3);
            width: 320px;
            box-sizing: border-box;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
            color: #633605;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 16px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            font-size: 16px;
            border: 2px solid #b98a56;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #633605;
            outline: none;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px 0;
            background-color: #633605;
            color: #F2E9D6;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: AL-Medium, Arial, sans-serif;
        }

        button:hover {
            background-color: #b98a56;
        }

        p.error-message {
            color: red;
            margin-bottom: 15px;
            font-weight: 600;
        }

        /* Адаптивность */
        @media (max-width: 400px) {
            .login-container {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Авторизация администратора</h2>
        <?php if ($error): ?>
            <p class="error-message"><?=htmlspecialchars($error)?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label>Логин:
                <input type="text" name="username" required autofocus>
            </label>
            <label>Пароль:
                <input type="password" name="password" required>
            </label>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>
