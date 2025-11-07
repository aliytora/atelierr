<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=Atelier;charset=utf8', 'root', '');

$stmt = $pdo->query("SELECT * FROM question");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Вопросы - Админка</title>
    <style>
        /* Базовые стили */
        body, html {
            margin: 0; padding: 0;
            font-family: AL-Medium, Arial, sans-serif;
            background-color: #F2E9D6;
            color: #633605;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
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
        .container {
            flex: 1;
            display: flex;
            min-height: 0;
        }
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
        main.content {
            flex: 1;
            padding: 30px 40px;
            overflow-y: auto;
        }
        main.content h1 {
            margin-top: 0;
            color: #633605;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(99, 54, 5, 0.2);
        }
        th, td {
            border: 1px solid #b98a56;
            padding: 10px 12px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #b98a56;
            color: white;
            font-weight: 600;
        }
        p.no-questions {
            font-style: italic;
            color: #8c6f3e;
            margin-top: 20px;
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
            table {
                font-size: 12px;
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
            <h1>Вопросы</h1>
            <?php if (count($questions) === 0): ?>
                <p class="no-questions">Вопросов пока нет.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <?php foreach (array_keys($questions[0]) as $col): ?>
                                <th><?=htmlspecialchars($col)?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questions as $row): ?>
                            <tr>
                                <?php foreach ($row as $cell): ?>
                                    <td><?=htmlspecialchars($cell)?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
