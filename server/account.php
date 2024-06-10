<?php
include 'check_session.php';  

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .content h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .content a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .content a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="menu">
            <a href="../index.html" class="menu-link">Главная</a>
            <a href="../recipes.html" class="menu-link">Рецепты</a>
            <a href="profile.php" class="menu-link">Профиль</a>
            <a href="../about.html" class="menu-link">О нас</a>
        </div>
        <div class="content">
            <h1>Добро пожаловать, <?php echo htmlspecialchars($username); ?>!</h1>
            <a href="../account.html">Аккаунт</a>
            <a href="logout.php">Выйти</a>
        </div>
    </div>
</body>
</html>
