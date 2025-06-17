# Рецепты от бабули

Веб-приложение для хранения и обмена рецептами с удобным интерфейсом и системой авторизации.

## Описание

"Рецепты от бабули" - это веб-приложение, которое позволяет пользователям:
- Просматривать рецепты
- Добавлять новые рецепты
- Редактировать существующие рецепты
- Регистрироваться и авторизоваться
- Управлять своим профилем

## Структура проекта

```
php_babushka_recipes/
├── public/
│   └── style.css
├── server/
│   ├── account.php
│   ├── check_session.php
│   ├── login.php
│   ├── logout.php
│   ├── profile.php
│   └── signup.php
└── views/
    ├── about.html
    ├── account.html
    ├── add_recipe.html
    ├── edit_recipe.html
    ├── index.html
    ├── login.html
    ├── recipes.html
    └── registrate.html
```

## Требования

- PHP 7.4 или выше
- MySQL/MariaDB
- Веб-сервер (Apache/Nginx)

## Установка

1. Клонируйте репозиторий:
```bash
git clone https://github.com/yourusername/php_babushka_recipes.git
```

2. Настройте веб-сервер для работы с PHP

3. Создайте базу данных и настройте подключение:
```sql
CREATE DATABASE babushka_recipes;
USE babushka_recipes;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    ingredients TEXT,
    instructions TEXT,
    category VARCHAR(50),
    difficulty_level VARCHAR(20),
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

4. Настройте подключение к базе данных в PHP файлах:
```php
$host = 'localhost';
$dbname = 'babushka_recipes';
$username = 'your_username';
$password = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
```

5. Разместите файлы в директории веб-сервера

## Использование

1. Откройте приложение в браузере
2. Зарегистрируйтесь или войдите в существующий аккаунт
3. Начните просматривать и добавлять рецепты

### Примеры использования API

#### Регистрация нового пользователя
```javascript
$.ajax({
    url: 'server/signup.php',
    method: 'POST',
    data: {
        username: 'username',
        password: 'password'
    },
    success: function(response) {
        console.log('Регистрация успешна');
    }
});
```

#### Добавление нового рецепта
```javascript
$.ajax({
    url: 'server/add_recipe.php',
    method: 'POST',
    data: {
        title: 'Название рецепта',
        description: 'Описание',
        ingredients: 'Ингредиенты',
        instructions: 'Инструкции',
        category: 'Категория',
        difficulty_level: 'Сложность'
    },
    success: function(response) {
        console.log('Рецепт добавлен');
    }
});
```

## Функциональность

- **Главная страница**: Просмотр последних добавленных рецептов
- **Рецепты**: Просмотр всех рецептов с возможностью фильтрации
- **Добавление рецепта**: Форма для создания нового рецепта
- **Редактирование рецепта**: Изменение существующих рецептов
- **Профиль**: Управление личной информацией
- **Авторизация**: Регистрация и вход в систему

## Технологии

- PHP
- MySQL
- HTML/CSS
- JavaScript/jQuery
- AJAX для асинхронных запросов

## Безопасность

- Защита от SQL-инъекций
- Валидация пользовательского ввода
- Безопасное хранение паролей
- Сессии для авторизации

## Скриншоты

![Главная страница](screenshots/main.png)
![Страница рецептов](screenshots/recipes.png)
![Добавление рецепта](screenshots/add_recipe.png)

## Контрибьюторы

- [Ваше имя](https://github.com/yourusername) - Основной разработчик

## Лицензия

MIT License 