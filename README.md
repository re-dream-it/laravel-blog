# 📝 Modern Blog with Laravel + Livewire

A responsive blog platform with real-time interactions, built with Laravel, Bootstrap, Markdown support and Livewire.

![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4E56A6?logo=livewire)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?logo=bootstrap&logoColor=white)

## ✨ Features
- **User authentication** (register/login/logout)
- **Post management** (CRUD operations with admin panel)
- **Engagement features** (likes, comments, filters) via Livewire
- **Responsive design** with Bootstrap 5
- **Markdown support** with comfortable Toast UI editor

## ᯓ★ Quick Start
```bash
# Clone repo
git clone https://github.com/yourname/laravel-blog.git
cd laravel-blog

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env then:
php artisan migrate --seed

# Run locally
php artisan serve
npm run build
npm run dev
```

## 🔧 Tech Stack
| Component       | Technologies |
|-----------------|-------------|
| **Backend**     | ![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?logo=php) ![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel) |
| **Frontend**    | ![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap) ![Livewire](https://img.shields.io/badge/Livewire-3-4E56A6?logo=livewire) |
| **Database**    | ![MariaDB](https://img.shields.io/badge/MariaDB-11.4-003545?logo=mariadb) |
| **Auth**        | ![Laravel Breeze](https://img.shields.io/badge/Breeze-2.0-FF2D20?logo=laravel) |

## 📂 Project Structure

### `app/` Directory
```
├── Actions/ # Business logic operations
├── Http/ # Controllers, Middleware, Requests
├── Livewire/ # Livewire components
├── Models/ # Eloquent models
├── Policies/ # Authorization policies
├── Providers/ # Service providers
├── Services/ # Business logic services
└── Traits/ # Reusable traits
```

### `resources/` Directory
```
resources/
├── css/ # Compiled CSS
├── js/ # JavaScript files
├── sass/ # SCSS styles
└── views/ # Blade templates
├── admin/ # Admin panel views
├── auth/ # Authentication views
├── includes/ # Partial views
├── layouts/ # Base layouts
├── livewire/ # Livewire component views
└── post/ # Post-related views
```

## 🖼️ Application Preview

| Section         | Screenshot                                     | Description                           |
|-----------------|------------------------------------------------|---------------------------------------|
| **Homepage** | ![image](https://github.com/user-attachments/assets/38412c49-469a-40a8-858e-46c19ca3aad6) | Your presentable page |
| **Posts** | ![image](https://github.com/user-attachments/assets/3f8d5152-1ac9-4817-a3f4-8421b4e592bd) | Whole posts page with paginataion and filters |
| **Post page** | ![image](https://github.com/user-attachments/assets/bc653837-0ae4-48d7-87ce-5b5cb4d12393) | Full post page with comments and likes |
| **Admin Panel** | ![image](https://github.com/user-attachments/assets/b4cc6af8-844c-4320-8a28-f56af7902914) | Usable CMS interface |
| **Mobile View** | ![image](https://github.com/user-attachments/assets/a91970e7-6622-4c3d-9f6d-beea549e5bc2) | Responsive mobile adaptation |






