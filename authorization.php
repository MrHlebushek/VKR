<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <style>
        html{
            height: 100%;
        }
        body {
            width: 100%;
            height: 100%;
            max-width: 100%;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url(Auth_back.png);
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
        .logo1 {
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
            overflow: hidden;
        }
        .welcome-text {
            color: #ffffff;
            font-size: 42px;
            margin-left: 250px;
        }
        .logo1 img {
            max-width: 100%;
            max-height: auto;
        }
        .login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form input {
            padding: 10px;
            font-size: 18px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 300px;
            max-length: 20;
        }
        .login-form button {
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #003366;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-form button:hover {
            background-color: #005599;
        }
        .auth_link {
            color: #ffffff;
            text-decoration: none;
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
        input::placeholder {
            color: #ccc;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo1">
            <img src="logo1.png" alt="Логотип компании">
        </div>
        <div class="welcome-text">Вход в аккаунт</div>
        <div class="menu">
            <a class="auth_link" href="/VKR/index.php"><button class="menu-button">Главная</button></a>
            <button class="menu-button">О нас</button>
            <button class="menu-button">Новости</button>
            <button class="menu-button">Контакты</button>
        </div>
    </div>
    <div class="login-form">
    <form>
        <div style="display: flex; flex-direction: column; align-items: center;">
            <div class="login-form"> <form> <div style="display: flex; flex-direction: column; align-items: center;"> <div style="text-align: center; margin-bottom: 20px;"> <p style="font-size: 18px; font-weight: bold;">Обратите внимание!</p> <p style="font-size: 14px;">Доступ к аккаунтам имеют только члены персонала. 
            Если вы являетесь работником компании и ещё не владеете аккаунтом, - обратитесь к администратору, 
            чтобы он создал аккаунт и сообщил Вам персональные логин и пароль.</p> </div>
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required maxlength="20" placeholder="не более 20 символов">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required maxlength="20" placeholder="не более 20 символов">
            <button type="submit" style="margin-top: 20px;">Войти</button>
        </div>
    </form>
</div>
</body>
</html>