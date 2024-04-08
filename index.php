<?php
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Ошибка: " . $conn->connect_error);
}

$conn->set_charset("utf");

echo "Подключено"
?>

<!DOCTYPE html>
<html>
<head>
    <title>Главное меню</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            max-width: 100%;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url(background.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .header {
            background-color: #003366;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        .logo {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 200px;
            height: 200px;
            background-color: #ffffff;
            border-radius: 50%;
            border: 1px solid #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .welcome-text {
            color: #ffffff;
            font-size: 42px;
            margin-left: 250px;
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .slider {
            position: relative;
            width: 85%;
            height: 800px;
            margin: auto;
        }
        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: bold;
            transition: opacity 0.5s;
            opacity: 0;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 10px;
            margin: 0;
        }
        .slide-1 {
            background-image: url(Slide1.png);
        }
        .slide-2 {
            background-image: url(Slide2.png);
        }
        .slide-3 {
            background-image: url(Slide3.png);
        }
        .slide.active {
            opacity: 1;
        }
        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
        }
        .slider-dot {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #cccccc;
            margin: 0 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .slider-dot.active {
            background-color: #0099cc;
        }
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 36px;
            color: #ffffff;
            opacity: 0.5;
            transition: opacity 0.3s;
        }
        .slider-arrow:hover {
            opacity: 1;
        }
        .slider-arrow.left {
            left: 20px;
        }
        .slider-arrow.right {
            right: 20px;
        }
        .slide-text {
            position: absolute;
            opacity: 0;
            transition: opacity 0.5s;
            font-size: 24px;
            color: #ffffff;
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }
        .slide-text.active {
            opacity: 1;
        }
        .slide-text.bottom-right {
            bottom: 20px;
            right: 20px;
        }
        .slide-text.top-right {
            top: 20px;
            right: 20px;
        }
        .auth_link {
            color: #ffffff;
            text-decoration: none;
        }
        .login-button {
            padding: 30px 50px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #003366;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-button:hover {
            background-color: #005599;
        }
        .menu {
            display: flex;
            flex-grow: 1;
            justify-content: flex-end;
            align-items: center;
        }
        .menu-button {
            display: block;
            padding: 39px 45px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
            color: #ffffff;
            background-color: transparent;
        }
        .menu-button:hover {
            background-color: #005599;
        }
        .menu-button a {
            color: #ffffff
            text-decoration: none;
            display: block; 
            width: 100%; 
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.png" alt="Логотип компании">
        </div>
        <div class="welcome-text">Добро пожаловать в HHT! Грузим грузы!</div>
        <div class="menu">
            <a class="auth_link" href="/VKR/index.php"><button class="menu-button">Главная</button></a>
            <button class="menu-button">О нас</button>
            <button class="menu-button">Новости</button>
            <button class="menu-button">Контакты</button>
            <a class="auth_link" href="/VKR/scripts/authorization.php"><button class="menu-button">Вход</button></a>
        </div>
    </div>
    <div class="slider">
        <div class="slide slide-1 active">
            <div class="slide-text bottom-right active">Новость 1</div>
        </div>
        <div class="slide slide-2">
            <div class="slide-text bottom-right">Новость 2</div>
        </div>
        <div class="slide slide-3">
            <div class="slide-text top-right">Новость 3</div>
        </div>
        <div class="slider-nav">
            <div class="slider-dot active"></div>
            <div class="slider-dot"></div>
            <div class="slider-dot"></div>
        </div>
        <div class="slider-arrow left">&lt;</div>
        <div class="slider-arrow right">&gt;</div>
    </div>
    <script>
        let currentSlide = 1;
        function showSlide(n) {
            let slides = document.querySelectorAll('.slide');
            let dots = document.querySelectorAll('.slider-dot');
            let slideTexts = document.querySelectorAll('.slide-text');
            slides.forEach((slide) => {
                slide.classList.remove('active');
            });
            dots.forEach((dot) => {
                dot.classList.remove('active');
            });
            slideTexts.forEach((slideText) => {
                slideText.classList.remove('active');
            });
            slides[n-1].classList.add('active');
            dots[n-1].classList.add('active');
            setTimeout(() => {
                slideTexts[n-1].classList.add('active');
            }, 1000);
            currentSlide = n;
        }
        function nextSlide() {
            let slides = document.querySelectorAll('.slide');
            if (currentSlide === slides.length) {
                currentSlide = 1;
            } else {
                currentSlide++;
            }
            showSlide(currentSlide);
        }
        function prevSlide() {
            let slides = document.querySelectorAll('.slide');
            if (currentSlide === 1) {
                currentSlide = slides.length;
            } else {
                currentSlide--;
            }
            showSlide(currentSlide);
        }
        let sliderArrows = document.querySelectorAll('.slider-arrow');
        sliderArrows.forEach((arrow) => {
            arrow.addEventListener('click', () => {
                if (arrow.classList.contains('left')) {
                    prevSlide();
                } else {
                    nextSlide();
                }
            });
        });
        setInterval(nextSlide, 5000);
    </script>
</body>
</html>
