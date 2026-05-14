# Amine Aboukhassib — Developer Portfolio

A dynamic, full-stack portfolio application built with **Laravel 13** and **Vanilla JS/CSS**. This project showcases professional experience, dynamically loads projects from a database, and features a comprehensive Admin Dashboard to manage content, read messages, and track visitors.

## 🚀 Key Features

*   **Premium UI/UX:** A stunning, responsive design with dark mode aesthetics, glassmorphism, typing animations, and custom CSS interactions.
*   **Dynamic Project Management:** Add, edit, and delete portfolio projects securely from the admin dashboard.
*   **Direct Contact System:** An integrated contact form that saves messages directly to the database without needing external mail services.
*   **Visitor Intake Modal:** A smart, non-intrusive popup that asks new visitors for their name and email, saving the leads directly to the admin dashboard. Uses `localStorage` to ensure returning visitors are never bothered twice.
*   **Admin Dashboard:** A secured portal (protected by custom middleware) to view project statistics, read contact messages, and review visitor logs.
*   **Zero-Config Database:** Uses SQLite for seamless local development and easy deployment.

## 🛠️ Tech Stack

*   **Backend:** Laravel 13, PHP 8.4, SQLite
*   **Frontend:** HTML5, CSS3 (Custom Variables & Animations), Vanilla JavaScript (ES6+)
*   **Tooling:** Composer, Artisan, Vite

## ⚙️ Installation & Setup

Follow these steps to run the portfolio locally on your machine.

1. **Clone or Download the Repository**
2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```
3. **Environment Setup**
   Copy the example environment file:
   ```bash
   cp .env.example .env
   ```
   *Make sure `DB_CONNECTION=sqlite` is set in your `.env` file.*
4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```
5. **Run Database Migrations & Seeders**
   This will create the necessary tables (`projects`, `messages`, `visitors`, `users`) and populate the database with default projects and the admin user.
   ```bash
   php artisan migrate --seed
   ```
6. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   Visit the app at: `http://127.0.0.1:8000`

## 🔒 Admin Access

The dashboard is protected. You can access it by appending `/admin/login` to your local URL (e.g., `http://127.0.0.1:8000/admin/login`).

**Default Credentials:**
*   **Username:** `Admin`
*   **Password:** `112233Aa5957`

## 📂 Project Structure Highlights
*   `routes/web.php` - Contains all public pages, API endpoints (`/api/visitors`, `/api/contact`), and protected admin routes.
*   `app/Http/Controllers/` - Contains logic for the frontend (`PortfolioController`), APIs (`VisitorController`, `ContactController`, `ProjectController`), and backend (`AdminController`).
*   `resources/views/` - Contains the heavily styled Blade templates (`portfolio.blade.php`, `admin/dashboard.blade.php`).
*   `public/css/style.css` & `public/js/main.js` - The core frontend assets driving the UI and asynchronous data loading.

---
*Designed & Developed by Amine Aboukhassib.*
