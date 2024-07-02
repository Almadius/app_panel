# Административная панель блога

Это административная панель блога, созданная с использованием Laravel, AdminLTE и spatie/laravel-permission. Панель позволяет управлять постами, категориями и ролями с разными правами для пользователей-администраторов и модераторов.

## Требования

- PHP >= 7.4+
- Composer
- Laravel 9+
- MySQL

## Установка

1. Клонируйте репозиторий:
    ```sh
    git clone https://github.com/yourusername/your-repo-name.git
    ```

2. Перейдите в директорию проекта:
    ```sh
    cd your-repo-name
    ```

3. Установите зависимости:
    ```sh
    composer install
    ```

4. Создайте копию файла `.env`:
    ```sh
    cp .env.example .env
    ```

5. Обновите файл `.env` с вашими данными для подключения к базе данных:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6. Сгенерируйте ключ приложения:
    ```sh
    php artisan key:generate
    ```

7. Выполните миграции и запустите сиддеры для заполнения базы данных:
    ```sh
    php artisan migrate --seed
    ```

8. Запустите локальный сервер разработки:
    ```sh
    php artisan serve
    ```

9. Откройте приложение в вашем веб-браузере:
    ```sh
    http://127.0.0.1:8000
    ```

## Стандартные пользователи

- **Администратор:**
    - Email: admin@example.com
    - Пароль: password

- **Модератор:**
    - Email: moderator@example.com
    - Пароль: password

## Возможности

- Управление постами: создание, редактирование, удаление
- Управление категориями: создание, редактирование, удаление
- Управление ролями и правами доступа
- Загрузка и управление изображениями для постов

## Лицензия

Этот проект является открытым программным обеспечением и доступен по лицензии MIT.