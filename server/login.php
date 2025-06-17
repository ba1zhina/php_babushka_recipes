<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE login = ?");
    if ($stmt === false) {
        die("Ошибка при подготовке оператора: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $stored_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if ($password === $stored_password) {
            $_SESSION['username'] = $username;
            echo "Вход успешен! Перенаправление...";
            header("Location: ../views/account.html");
            exit;
        } else {
            echo "Неверный пароль!";
        }
    } else {
        echo "Имя пользователя не найдено!";
    }

    $stmt->close();
    $conn->close();
}
?>
