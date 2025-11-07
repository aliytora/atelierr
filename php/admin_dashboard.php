<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Админская панель</title>
    <style>
        /* Сброс и базовые стили */
        * {
            box-sizing: border-box;
        }
        body, html {
            margin: 0;
            padding: 0;
            font-family: AL-Medium, Arial, sans-serif;
            background-color: #F2E9D6;
            color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Шапка */
        header {
            background-color: #633605;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        header a.logout {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border: 2px solid white;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        header a.logout:hover {
            background-color: white;
            color: #633605;
        }

        /* Основной контейнер с боковым меню и контентом */
        .container {
            flex: 1;
            display: flex;
            min-height: 0; /* Чтобы flex children корректно скроллились */
        }

        /* Боковое меню */
        nav.sidebar {
            background-color: #8c6f3e;
            width: 220px;
            padding-top: 30px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        nav.sidebar a {
            color: white;
            padding: 15px 25px;
            text-decoration: none;
            font-weight: bold;
            border-left: 4px solid transparent;
            transition: background-color 0.3s, border-color 0.3s;
        }

        nav.sidebar a:hover,
        nav.sidebar a.active {
            background-color: #b98a56;
            border-left-color: white;
            color: white;
        }

        /* Основной контент */
        main.content {
            flex: 1;
            padding: 30px 40px;
            overflow-y: auto;
            text-align: center;
        }

        main.content h1 {
            margin-top: 0;
            color: #633605;
        }

        img.admin-img {
            max-width: 400px;
            margin-top: 40px;
            max-width: 100%;
            height: auto;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            nav.sidebar {
                width: 100%;
                flex-direction: row;
                padding: 0;
                box-shadow: none;
            }
            nav.sidebar a {
                flex: 1;
                padding: 12px 10px;
                border-left: none;
                border-bottom: 3px solid transparent;
                text-align: center;
                font-size: 14px;
            }
            nav.sidebar a:hover,
            nav.sidebar a.active {
                border-left: none;
                border-bottom-color: white;
                background-color: #b98a56;
            }
            main.content {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div>Админская панель</div>
        <a href="logout.php" class="logout">Выйти</a>
    </header>
    <div class="container">
        <nav class="sidebar">
            <a href="questions.php" class="active">Вопросы</a>
            <a href="orders.php">Заказы</a>
            <a href="feedback.php">Отзывы</a>
        </nav>
        <main class="content">
            <h1>Добро пожаловать в админскую панель, <?=htmlspecialchars($_SESSION['admin_username'])?>!</h1>
            <img class="admin-img" src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png" alt="Админская панель"/>
        </main>
    </div>
</body>
</html>
