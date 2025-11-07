

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AboutUS</title>
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
        /* Основные стили */



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

        .p2{
            font-family: Al-Medium;
            color: #573204;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h1{
            font-family: Al-ExtraBold;
            color: #573204;
            font-size: 36px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        h3{
            font-family: Al-Medium;
            color: #573204;
            font-size: 30px;
            
        }
        
        
   .list-container {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background-color: #fffaef;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

ul.custom-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

ul.custom-list li {
    display: flex;
    align-items: flex-start;
    margin-left: 30px;
    margin-bottom: 20px;
}

ul.custom-list li > div {
    display: inline-block;
    vertical-align: top;
}

ul.custom-list li img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    margin: 45px 10px 0 15px; /* сверху справа снизу слева */
}

ul.custom-list h3 {
    font-weight: bold;
    font-size: 1.2rem;
    margin-bottom: 5px;
}

ul.custom-list p {
    font-family: AL-Medium;
    color: #573204;
    font-size: 20px;
    margin: 0; /* убираем лишние отступы */
}

.image-section {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: #F2E9D6;
    text-align: center;
    border-radius: 10px;
}

.image-section img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    display: inline-block;
}


    

.form-container { 
    max-width: 500px; 
        margin: 40px auto; 
        padding: 20px; 
        background-color: #fffaef; 
        border-radius: 26px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        
} 


    input[type="text"], input[type="tel"] { 
        width: calc(100% - 20px); 
        padding: 10px; 
        font-family: AL-Medium;
        border: 1px solid #573204; 
        border-radius: 15px; 
    } 
    
    textarea { 
        width: calc(100% - 20px); 
        padding: 10px; 
        font-family: AL-Medium;
        border: 1px solid #573204; 
        border-radius: 20px; 
        resize: vertical; 
        min-height: 100px; 
        margin-bottom: 15px;
    } 


 .button-container {
      text-align: center;
      margin-bottom: 20px;
    }   


button {
       background-color: #e8dabb; 
       color: #573204; 
      border: none;
      padding: 10px 40px;
      font-size: 20px;
      border-radius: 50px;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(88, 62, 25, 0.979);
    border: 1px solid #573204; 
    transition: all 0.3s ease-in-out; 
    font-family: AL-Medium;    
    }

button:hover {
    transform: scale(1.05); 
    }

label { 
    display: block; 
    font-weight: bold; 
    margin-bottom: 5px; 
} 

span.error-message { 
    color: red; 
    font-size: 12px; 
    display: inline-block; 
    margin-top: 5px; 
}

 .our-team {
    max-width: 960px;
    margin: 60px auto;
    padding: 0 15px;
    font-family: AL-Medium;
    color: #573204;
    text-align: center;
  }

  .our-team h2 {
    font-family: AL-ExtraBold;
    font-size: 36px;
    margin-bottom: 40px;
  }

  .team-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px 0px;
  }

  .team-member img {
    width: 80%;
    transition: transform 0.3s ease;
  }

  .team-member img:hover {
    transform: scale(1.05);
  }

  .team-member p {
    margin-top: 12px;
    font-size: 18px;
    font-weight: 600;
    color: #573204;
  }


   .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Задержки для последовательного появления */
        .fade-in:nth-child(1) { transition-delay: 0.1s; }
        .fade-in:nth-child(2) { transition-delay: 0.2s; }
        .fade-in:nth-child(3) { transition-delay: 0.3s; }
        .fade-in:nth-child(4) { transition-delay: 0.4s; }
        

    footer {
            background-color: #d2c3a4;
            color: #573204;
            text-align: center;
            padding: 10px 0;
            clear: both;
        }



/* Мобильные устройства (до 599px) */
@media screen and (max-width: 599px) {
  header {
    flex-direction: column;
    height: auto;
    padding: 10px 0;
  }

  nav.left-nav,
  nav.right-nav {
    width: 100%;
    text-align: center;
    margin: 10px 0 0 0;
  }

  nav.left-nav ul,
  nav.right-nav ul {
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px; /* вместо margin */
    padding: 0;
  }

  nav.left-nav li,
  nav.right-nav li {
    margin: 0; /* убираем margin, используем gap */
  }

  .logo {
    position: relative; /* чтобы логотип не перекрывал меню */
    left: auto;
    top: auto;
    transform: none;
    margin: 0 auto;
  }

  .logo img {
    width: 80px;
    height: auto;
  }

  main {
    padding: 10px;
  }

  section {
    padding: 10px;
  }
}

/* Планшеты (600px - 899px) */
@media screen and (min-width: 600px) and (max-width: 899px) {
  header {
    flex-wrap: wrap; /* чтобы меню и логотип могли переноситься */
    height: auto;
    padding: 15px 20px;
  }

  nav.left-nav,
  nav.right-nav {
    width: auto;
    text-align: center;
  }

  nav.left-nav ul,
  nav.right-nav ul {
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
  }

  nav.left-nav li,
  nav.right-nav li {
    margin: 0;
  }

  .logo {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
  }

  .logo img {
    width: 100px;
    height: auto;
  }

  main {
    padding: 20px;
  }

  section {
    padding: 20px;
  }
}

/* Десктопы (900px и выше) */
@media screen and (min-width: 900px) {
  header {
    flex-wrap: nowrap;
    height: 90px;
    padding: 0 20px;
  }

  nav.left-nav ul,
  nav.right-nav ul {
    justify-content: space-evenly;
    gap: 55px; /* как у тебя было */
  }

  nav.left-nav li,
  nav.right-nav li {
    margin: 0;
  }

  .logo {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
  }

  .logo img {
    width: 120px;
    height: auto;
  }

  main {
    padding: 30px;
  }

  section {
    padding: 30px;
  }
}

    </style>



</head>
<body>

     <!-- Шапка -->
    <header>
        <nav class="left-nav">
            <ul>
                <li><a href="../html/about_us.php">About us</a></li>
                <li><a href="../html/custom_tailoring.html">Custom tailoring</a></li>
                <li><a href="../html/finished_products.html">Finished products</a></li>
            </ul>
        </nav>
        
        <div class="logo">
            <a href="../html/glavnaya.html"><img src="../img/logo.png" alt="Логотип"></a></div>
        <nav class="right-nav">

        <nav class="right-nav">
            <ul>
                <li><a href="../html/prices.html">Prices</a></li>
                <li><a href="../html/portfolio.html">Portfolio</a></li>
                <li><a href="../html/reviews.php">Reviews</a></li>
                <li><a href="../html/contacts.html">Contacts</a></li>
                <li><a href="../html/korzina_1.html"><img src="../img/korzina.png" alt="Корзина" width="20px" height="20px"></a></li>
            </ul>
        </nav>
    </header>


    <main>
      <section class="gg fade-in">
            <h1>About us</h1>
            <p class="p2">An atelier is not just a sewing workshop, but a cozy place where clients' dreams of style and<br>individuality come true. We create unique handmade items that will emphasize your uniqueness<br>and style.</p>
        </section>
            
          <section class="gg fade-in">
            <h1>8 reasons to order tailoring from us</h1>
    <div class="list-container">
        <ul class="custom-list">
            <li>
                <img src="../img/about_us_reason1.png" alt="Marker Image">
                <div>
                    <h3>We will select any fabrics</h3>
                    <p>From elite to economical, you can choose from materials of any class in a wide<br>range of colors</p>
                </div>
            </li>
            <li>
                <img src="../img/about_us_reason2.png" alt="Marker Image">
                <div>
                    <h3>The high skill of our tailors</h3>
                    <p>Do you want a luxurious evening dress or are you just looking for a comfortable<br>skirt for every day? Any item in the hands of our tailors is born beautiful and comfortable to wear</p>
                </div>
            </li>
            <li>
                <img src="../img/about_us_reason3.png" alt="Marker Image">
                <div>
                    <h3>We will develop a sketch and suggest ideas</h3>
                    <p>Don't know which model to choose for sewing? We are always happy to share<br>our ideas with you</p>
                </div>
            </li>
            <li>
                <img src="../img/about_us_reason4.png" alt="Marker Image">
                <div>
                    <h3>Professional sewing equipment</h3>
                    <p>We use only high-quality industrial equipment and modern cutting<br>technologies for our work</p>
                </div>
            </li>
            <li>
                <img src="../img/about_us_reason5.png" alt="Marker Image">
                <div>
                    <h3>We promptly respond to your requests</h3>
                    <p>We work from 10 to 20 o'clock, but even if you have a question about sewing at<br>a late hour, we will not keep you waiting and will definitely respond to your<br>request as soon as possible.</p>
                </div>
            </li>
            <li>
                <img src="../img/about_us_reason6.png" alt="Marker Image">
                <div>
                    <h3>We will offer several cut options</h3>
                    <p>There are many variations of the model's cut — it is possible to make different<br>versions of sleeves, clasps, and cutouts. We will offer you several ways to design<br>the details so that you can choose what is convenient and pleasant for you.</p>
                </div>
            </li>
            <li>
                <img src="../img/about_us_reason7.png" alt="Marker Image">
                <div>
                    <h3>Convenient payment methods</h3>
                     <p>You can pay for the services of our atelier in cash, by bank card through the<br>payment terminal or by online transfer. For legal entities, it is possible to pay toa bank account under an agreement.</p>
               </div>
            </li>
            
        </ul>
    </div>
</section>

<section class=" our-team fade-in">
  <h2>Our team</h2>
  <div class="team-grid">
    <div class="team-member">
      <img src="../img/31.png" alt="Member 1" />
      <p>Fashion designer</p>
    </div>
    <div class="team-member">
      <img src="../img/32.png" alt="Member 2" />
      <p>The owner of the atelier</p>
    </div>
    <div class="team-member">
      <img src="../img/33.png" alt="Member 3" />
      <p>The master of tailoring</p>
    </div>
    <div class="team-member">
      <img src="../img/34.png" alt="Member 4" />
      <p>The master of tailoring</p>
    </div>
    <div class="team-member">
      <img src="../img/35.png" alt="Member 5" />
      <p>Fashion Designer</p>
    </div>
    <div class="team-member">
      <img src="../img/36.png" alt="Member 6" />
      <p>Administrator</p>
    </div>
  </div>
</section>


<section class="fade-in">
    <h1 style="text-align:center;">Any questions?</h1>
    <p class="p2">Write to us to get a free consultation on sewing women's clothing,<br>calculate the cost or place an order.</p>

    <div class="form-container">
<form id="contactForm" method="POST" action="../php/question_handler.php">
    <input type="text" name="name" placeholder="Your name" required /><br>
      <br><input type="tel" name="phone" placeholder="Your phone" required pattern="7[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" /><br>
      <br><textarea name="comment" placeholder="Your question"></textarea><br>
     <div class="button-container">
<button type="submit">SEND</button>
</div>
    </form>
</section>

   
<?php
if (isset($_GET['success'])) {
    echo '<p style="color: green;">Вопрос успешно отправлен!</p>';
} elseif (isset($_GET['error'])) {
    echo '<p style="color: red;">Ошибка: ' . htmlspecialchars($_GET['error']) . '</p>';
}
?>

</section>

<script> 

document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Можно обработать ответ, показать сообщение и т.д.
        alert('Спасибо! Ваша заявка отправлена.');
        form.reset();
    })
    .catch(error => {
        alert('Ошибка отправки!');
    });
});


 </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            
            function checkVisibility() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementBottom = element.getBoundingClientRect().bottom;
                    
                    if (elementTop < window.innerHeight && elementBottom > 0) {
                        element.classList.add('visible');
                    }
                });
            }
            
            checkVisibility();
            window.addEventListener('scroll', checkVisibility);
        });
    </script>

    </main>

<!-- Подвал -->
    <footer>
        © 2025 Reshetnikova Darya
    </footer>


</body>
</html>