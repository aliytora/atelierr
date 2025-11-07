<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=Atelier;charset=utf8', 'root', '');

// Обработка публикации/скрытия отзыва
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_id'])) {
    $id = intval($_POST['toggle_id']);
    $publish = intval($_POST['publish']);
    $stmt = $pdo->prepare("UPDATE feedback SET is_published = ? WHERE id = ?");
    $stmt->execute([$publish, $id]);
    header("Location: feedback.php");
    exit;
}

// Получаем все отзывы
$stmt = $pdo->query("SELECT * FROM feedback ORDER BY created_at DESC");
$feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Отзывы - Админка</title>
    <style>
        /* Общие стили */
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
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            margin-top: 20px;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(99, 54, 5, 0.2);
            table-layout: fixed;
            word-wrap: break-word;
            word-break: break-word;
        }
        th, td {
            border: 1px solid #b98a56;
            padding: 10px 12px;
            text-align: left;
            vertical-align: top;
            white-space: normal;
            overflow-wrap: break-word;
        }
        th {
            background-color: #b98a56;
            color: white;
            font-weight: 600;
        }
        p.no-feedback {
            font-style: italic;
            color: #8c6f3e;
            margin-top: 20px;
        }
        form {
            display: inline;
        }
        button.publish-btn {
            padding: 6px 14px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 4px;
            border: none;
            font-family: AL-Medium, Arial, sans-serif;
            transition: background-color 0.3s ease;
        }
        button.publish-btn.publish {
            background-color: #4CAF50;
            color: white;
        }
        button.publish-btn.publish:hover {
            background-color: #45a049;
        }
        button.publish-btn.unpublish {
            background-color: #f44336;
            color: white;
        }
        button.publish-btn.unpublish:hover {
            background-color: #d7372f;
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
        <a href="questions.php">Вопросы</a>
        <a href="orders.php">Заказы</a>
        <a href="feedback.php" class="active">Отзывы</a>
    </nav>
    <main class="content">
        <h1>Отзывы клиентов</h1>
        <?php if (count($feedbacks) === 0): ?>
            <p class="no-feedback">Отзывов пока нет.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Комментарий</th>
                        <th>Дата создания</th>
                        <th>Публикация</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($feedbacks as $row): ?>
                        <tr>
                            <td><?=htmlspecialchars($row['id'])?></td>
                            <td><?=htmlspecialchars($row['name'])?></td>
                            <td><?=htmlspecialchars($row['phone'])?></td>
                            <td><?=htmlspecialchars($row['email'])?></td>
                            <td><?=nl2br(htmlspecialchars($row['comment']))?></td>
                            <td><?=htmlspecialchars($row['created_at'])?></td>
                            <td>
                                <form method="post" action="feedback.php">
                                    <input type="hidden" name="toggle_id" value="<?=$row['id']?>">
                                    <input type="hidden" name="publish" value="<?=($row['is_published'] ? 0 : 1)?>">
                                    <button type="submit" class="publish-btn <?=($row['is_published'] ? 'unpublish' : 'publish')?>">
                                        <?=($row['is_published'] ? 'Скрыть' : 'Опубликовать')?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</div>
</body>
</html>
