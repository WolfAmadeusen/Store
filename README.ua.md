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

<strong>Store</strong> — це проєкт онлайн-магазину, який використовує стек технологій: **HTML**, **CSS**, **JavaScript (React)**, **PHP (Laravel)**, **SQL**. Магазин включає сторінки для гостей, користувачів і адміністраторів, а також функціонал для додавання, редагування і відображення продуктів, управління замовленнями, реєстрації та авторизації користувачів.

<br/>

## Структура проєкту

### 1. Головна сторінка

Головна сторінка сайту з категоріями товарів та посиланнями на популярні товари.

### 2. Панель адміністратора

Панель адміністратора для управління продуктами та замовленнями:

-   **Додавання продуктів**: Сторінка для додавання нових товарів (назва, опис, ціна, кількість, категорії, фото).
-   **Редагування продуктів**: Сторінка для редагування вже доданих товарів.
-   **Перегляд замовлень**: Сторінка для перегляду всіх замовлень користувачів.

### 3. Особистий кабінет користувача

-   Сторінка для перегляду та редагування профілю користувача.
-   Історія замовлень та інформація про поточне замовлення.

### 4. Реєстрація та авторизація

-   **Реєстрація**: Форма для створення нового облікового запису з валідацією даних.
-   **Авторизація**: Форма для входу в систему з перевіркою логіна та пароля.

### 5. Форма замовлення (кошик)

-   Можливість додавати товари до кошика та оформляти замовлення.

### 6. Сторінка продукту

-   Відображення детальної інформації про товар: назва, опис, ціна, категорії, фотографії.

<br/>

## Стек технологій

-   **Frontend**:

    -   **HTML**, **CSS**, **JavaScript** (React)
    -   **Bootstrap / Tailwind**
    -   **Vite** (для розробки та збірки)

-   **Backend**:

    -   **PHP (Laravel)**

-   **База даних**:
    -   **MySQL (SQL)**

<br/>

## Запуск

1. Склонуйте репозиторій:

    ```bash
     git clone https://github.com/WolfAmadeusen/Store.git
    ```

2. Встановлення залежностей:

    ```bash
      composer install
    ```

    ```bash
      npm install
    ```

3. Запуск міграцій та сідерів:

    ```bash
    php artisan migrate --seed
    ```

4. Запуск npm:

    ```bash
    npm run dev
    ```

5. Запуск Laravel:

    ```bash
        php artisan serve
    ```
