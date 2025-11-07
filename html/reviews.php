<?php
// Подключение к базе данных
$pdo = new PDO('mysql:host=localhost;dbname=Atelier;charset=utf8', 'root', '');

// Получаем только опубликованные отзывы, новые сверху
$stmt = $pdo->query("SELECT name, comment, created_at FROM feedback WHERE is_published = 1 ORDER BY created_at DESC");
$feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>Atelier - Отзывы</title>
  <style>
    @font-face {
      font-family: AL-ExtraBold;
      src: url(../fonts/AbhayaLibre-ExtraBold.ttf);
    }
    @font-face {
      font-family: AL-SemiBold;
      src: url(../fonts/AbhayaLibre-SemiBold.ttf);
    }
    @font-face {
      font-family: AL-Medium;
      src: url(../fonts/AbhayaLibre-Medium.ttf);
    }


    .fade-in-block {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 1s ease, transform 1s ease;
}

.fade-in-block.visible {
  opacity: 1;
  transform: translateY(0);
}
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #F2E9D6;
      
    }
     header {
    background-color: #F2E9D6;
    font-family: AL-Medium;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 90px;
    box-shadow: 0 2px 5px rgba(99, 54, 5, 0.93);
    position: relative;
    padding: 0 20px;
}

/* Левый и правый навигейшн остаются флексом */
nav.left-nav ul,
nav.right-nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

/* Отступы между пунктами меню */
nav.left-nav li,
nav.right-nav li {
    margin-left: 55px;
}

/* Контейнер для логотипа - позиционируем абсолютно по центру */
.logo {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 10; /* чтобы логотип был поверх навигации */
}

/* Размеры логотипа */
.logo img {
    width: 120px;
    height: 63px;
    vertical-align: middle;
}

        
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        
        nav li {
            margin-left: 55px;
        }
        
        nav a {
            text-decoration: none;
            color: black;
            transition: all 0.3s ease-in-out;
        }
        
        nav a:hover {
            color: #ffa500;
        }
    .logo {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      z-index: 10;
    }
    .logo img {
      width: 120px;
      height: 63px;
      vertical-align: middle;
    }
    main {
      max-width: 960px;
      margin: 20px auto 20px;
      padding: 0 15px;
      text-align: center;
      font-family: AL-Medium;
      color: #573204;
    }
    h1 {
      font-family: AL-ExtraBold;
      font-size: 36px;
      margin-bottom: 40px;
      color: #573204;
    }
    .reviews-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px 20px;
      max-width: 960px;
      margin: 0 auto 50px;
    }
    .review-item {
  background-color: #d2c3a4;
  border-radius: 20px;
  padding: 20px 20px 25px; 
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  display: grid;
  grid-template-rows: auto 1fr auto; 
  justify-items: center;
  text-align: center;
  min-height: 220px; /
  position: relative;
}

.review-item::before {
  content: "";
  width: 100px;   
  height: 100px;
  background-image: url('../img/img.png');
  background-size: cover;
  background-position: center;
  border-radius: 50%;
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
  grid-row: 1 / 2; /* первый ряд */
  justify-self: center;
  margin-bottom: 15px; /* отступ под картинкой */
}

.review-name {
  font-weight: bold;
  font-size: 18px;
  color: #573204;
  grid-row: 3 / 4; /* третий ряд */
  margin-top: 10px;
}

.review-text {
  font-size: 16px;
  line-height: 1.5;
  color: #573204;
  white-space: pre-line;
  grid-row: 2 / 3; /* второй ряд */
  margin: 0 0 10px 0;
}

.review-date {
  font-size: 14px;
  color: #7b5c2b;
  grid-row: 4 / 5; /* если нужна дата ниже имени, можно добавить */
  margin-top: 5px;
}
    .button-container {
      text-align: center;
      margin-bottom: 40px;
    }
    .leave-review-btn {
      background-color: #e8dabb;
      color: #573204;
      border: 1px solid #573204;
      padding: 15px 60px;
      font-size: 20px;
      border-radius: 50px;
      cursor: pointer;
      font-family: AL-Medium;
      box-shadow: 0 4px 10px rgba(88, 62, 25, 0.98);
      transition: all 0.3s ease-in-out;
    }
    .leave-review-btn:hover {
      background-color: #d6c494;
      transform: scale(1.05);
    }
    footer {
      background-color: #d2c3a4;
      color: #573204;
      text-align: center;
      padding: 10px 0;
      clear: both;
    }
    @media screen and (max-width: 599px) {
      .reviews-grid {
        grid-template-columns: 1fr;
        gap: 18px;
      }
      main {
        padding: 10px;
      }
    }
    @media screen and (min-width: 600px) and (max-width: 899px) {
      .reviews-grid {
        grid-template-columns: 1fr 1fr;
      }
      main {
        padding: 20px;
      }
    }
    @media screen and (min-width: 900px) {
      .reviews-grid {
        grid-template-columns: repeat(3, 1fr);
      }
      main {
        padding: 30px;
      }
    }
  </style>
</head>
<body>
  <header>
    <nav class="left-nav">
      <ul>
        <li><a href="../html/about_us.php">About us</a></li>
        <li><a href="../html/custom_tailoring.html">Custom tailoring</a></li>
        <li><a href="../html/finished_products.html">Finished products</a></li>
      </ul>
    </nav>
    <div class="logo">
      <a href="../html/glavnaya.html"><img src="../img/logo.png" alt="Логотип" /></a>
    </div>
    <nav class="right-nav">
      <ul>
        <li><a href="../html/prices.html">Prices</a></li>
        <li><a href="../html/portfolio.html">Portfolio</a></li>
        <li><a href="../html/reviews.php">Reviews</a></li>
        <li><a href="../html/contacts.html">Contacts</a></li>
        <li>
          <a href="../html/korzina_1.html"><img src="../img/korzina.png" alt="Корзина" width="20" height="20" /></a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <h1 class="fade-in-block">Feedback from our customers</h1>
    <div class="reviews-grid fade-in-block">
      <?php if (count($feedbacks) === 0): ?>
        <p style="grid-column: 1/-1; text-align:center; font-size: 1.2em; color: #a0522d;">No reviews yet.</p>
      <?php else: ?>
        <?php foreach ($feedbacks as $review): ?>
          <div class="review-item">
            <div class="review-name"><?= htmlspecialchars($review['name']) ?></div>
            <p class="review-text"><?= nl2br(htmlspecialchars($review['comment'])) ?></p>
            <div class="review-date"><?= date('d.m.Y', strtotime($review['created_at'])) ?></div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="button-container fade-in-block">
      <button class="leave-review-btn" aria-label="Leave a review" onclick="window.location.href='write_review.html'">Leave a review</button>
    </div>
  </main>
  <footer>© 2025 Reshetnikova Darya</footer>



  <script>
  //плавное понявление
  function onScrollFadeIn() {
    document.querySelectorAll('.fade-in-block').forEach(function(el) {
      const rect = el.getBoundingClientRect();
      if(rect.top < window.innerHeight - 100) {
        el.classList.add('visible');
      }
    });
  }
  window.addEventListener('scroll', onScrollFadeIn);
  window.addEventListener('DOMContentLoaded', onScrollFadeIn);
</script>
</body>
</html>
