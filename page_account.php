<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<?php
session_start();
echo session_id() . '<br>';
echo session_name() . '<br>';
echo $_SESSION['email'] . '<br>';
?>
    <h1>Страница пользователя. Кабинет, чтоль.</h1>
    <a href="index.php">Главная</a><br>
    <label for="name">Введите ваше имя</label>
    <input type="text" name="name"/>
    <form action="logout.php" method="get">
        <button type="button"><a href="logout.php">Выйти</a></button>
    </form>
</body>
</html>

