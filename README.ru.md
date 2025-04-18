<p align="center">
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/laravel-10.0.0-red" alt="Laravel 11 Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Laravel Version"></a>
  <a href="https://www.php.net/"><img src="https://img.shields.io/badge/php-8.3-blue" alt="PHP Version"></a>
  <a href="https://vitejs.dev/"><img src="https://img.shields.io/badge/vite-4.0.4-orange" alt="Vite Version"></a>
  <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript"><img src="https://img.shields.io/badge/js-ES2024-yellow" alt="JavaScript Version"></a>
  <a href="https://react.dev/"><img src="https://img.shields.io/badge/react-18.2.0-blue" alt="React Version"></a>
  <a href="https://tailwindcss.com/"><img src="https://img.shields.io/badge/tailwindcss-3.3.4-blueviolet" alt="Tailwind CSS Version"></a>
  <a href="https://getbootstrap.com/"><img src="https://img.shields.io/badge/bootstrap-5.3.1-blue" alt="Bootstrap Version"></a>
  <a href="https://developer.mozilla.org/en-US/docs/Web/HTML"><img src="https://img.shields.io/badge/html-5-orange" alt="HTML Version"></a>
</p>

<br/>
<br/>

# Store

[English](README.md) | [Русский](README.ru.md) | [Український](README.ua.md)

<strong>Store</strong> — это проект онлайн-магазина, который использует стек технологий: **HTML**, **CSS**, **JavaScript (React)**, **PHP (Laravel)**, **SQL** . Магазин включает страницы для гостей, пользователей и администраторов, а также функционал для добавления, редактирования и отображения продуктов, управления заказами, регистрации и авторизации пользователей.

<br/>

## Структура проекта

### 1. Главная страница

Главная страница сайта с категориями товаров и с ссылками на популярные товары.

### 2. Панель администратора

Панель администратора для управления продуктами и заказами:

-   **Добавление продуктов**: Страница для добавления новых товаров (название, описание, цена, количество,категории, фото).
-   **Редактирование продуктов**: Страница для редактирования уже добавленных товаров.
-   **Просмотр заказов**: Страница для просмотра всех заказов пользователей.

### 3. Личный кабинет пользователя

-   Страница для просмотра и редактирования профиля пользователя.
-   История заказов и информация о текущем заказе.

### 4. Регистрация и авторизация

-   **Регистрация**: Форма для создания нового аккаунта с валидацией данных.
-   **Авторизация**: Форма для входа в систему с проверкой логина и пароля.

### 5. Форма заказа (корзина)

-   Возможность добавлять товары в корзину и оформлять заказ.

### 6. Страница продукта

-   Отображение подробной информации о товаре: название, описание, цена,категории, фотографии.

<br/>

## Стек технологий

-   **Frontend**:

    -   **HTML**, **CSS**, **JavaScript** (React)
    -   **Bootstrap / Tailwind**
    -   **Vite** (для разработки и сборки)

-   **Backend**:

    -   **PHP (Laravel)**

-   **База данных**:
    -   **MySQL (SQL)**

<br/>

## Установка и запуск

1. Склонируйте репозиторий:

    ```bash
    git clone https://github.com/WolfAmadeusen/Store.git
    ```

2. Установка зависимостей

    ```bash
      composer install
    ```

    ```bash
      npm install
    ```

3. Запуск миграции и сидеров:

    ```bash
      php artisan migrate --seed
    ```

4. Запуск зборки vite:

    ```bash
      npm run dev
    ```

5. Запуск laravel:

    ```bash
      php artisan serve
    ```
