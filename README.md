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

<strong>Store</strong> —  is an online store project built using the technology stack: **HTML**, **CSS**, **JavaScript (React)**, **PHP (Laravel)**, and **SQL**. The store includes pages for guests, users, and administrators, along with functionality for adding, editing, and displaying products, managing orders, and handling user registration and authentication.

<br/>

## Project Structure

### 1. Main Page
The homepage featuring product categories and links to popular items.

### 2. Admin Panel
An admin panel for managing products and orders:
- **Add Products**: A page to add new products (name, description, price, quantity, categories, photo).
- **Edit Products**: A page to edit existing products.
- **View Orders**: A page to view all user orders.

### 3. User Dashboard
- A page for viewing and editing user profiles.
- Order history and current order details.

### 4. Registration and Authentication
- **Registration**: A form to create a new account with data validation.
- **Authentication**: A login form to access the system with login and password verification.

### 5. Order Form (Cart)
- The ability to add items to a cart and place an order.

### 6. Product Page
- Displays detailed product information: name, description, price, categories, and photos.

<br/>

## Technology Stack

- **Frontend**:
  - **HTML**, **CSS**, **JavaScript** (React)
  - **Bootstrap / Tailwind**
  - **Vite** (for development and bundling)

- **Backend**:
  - **PHP (Laravel)**

- **Database**:
  - **MySQL (SQL)**

<br/>

## Installation and Launch

1. Clone the repository:
   ```bash
   git clone <repository_url>

2. Run migrations and seeders:
   ```bash
   php artisan migrate --seed

3. Start the Vite bundler:
   ```bash
   npm run dev

4. Start the Laravel server:
   ```bash
   php artisan serve
