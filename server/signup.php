<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repeatpassword = trim($_POST['repeatpassword']);

    if ($password !== $repeatpassword) {
        echo "Пароли не совпадают!";
        exit;
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE login = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Имя пользователя уже занято!";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        echo "Регистрация успешна! Перенаправление...";
        header("Location: ../views/account.html");
        exit;
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
