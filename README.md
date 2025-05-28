# 📝 Modern Blog with Laravel + Livewire

A responsive blog platform with real-time interactions, built with Laravel, Bootstrap, Markdown support and Livewire.

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
1. Clone this repository
```bash
git clone https://github.com/yourname/laravel-blog.git
cd laravel-blog
```
2. Create your `.env` file in root folder with settings:
```config
DB_DATABASE=db_name
DB_PASSWORD=pass
DB_USERNAME=user
UID=user_id
```
3. Copy `src/.env.example` to `src/.env` and provide Laravel settings.
4. Configure `docker/nginx/blog.conf`
5. Setup Docker Compose:
```bash
# Docker Setup
docker compose build --no-cache
docker compose up -d

# Post-install
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
docker compose exec app php artisan storage:link
docker compose exec app npm install && npm run build
```


## 🔧 Tech Stack
| Component       | Technologies |
|-----------------|-------------|
| **Backend**     | ![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?logo=php) ![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel) |
| **Frontend**    | ![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap) ![Livewire](https://img.shields.io/badge/Livewire-3-4E56A6?logo=livewire) |
| **Database**    | ![MariaDB](https://img.shields.io/badge/MariaDB-11.4-003545?logo=mariadb) |
| **Auth**        | ![Laravel Breeze](https://img.shields.io/badge/Breeze-2.0-FF2D20?logo=laravel) |
| **Deployment**  | ![Docker](https://img.shields.io/badge/Docker-24.0-2496ED?logo=docker)   |


## 🐳 Docker Services

| Service | Image | Ports | Volumes | Description |
|---------|-------|-------|---------|-------------|
| **app** | `php:8.3-fpm` | `9000` | `./src:/var/www` | Laravel application (PHP-FPM) |
| **nginx** | `nginx:alpine` | `80:80`, `443:443` | `./src:/var/www` | Web server |
| **mysql** | `mysql:8.0` | `3306:3306` | `mysql_data:/var/lib/mysql` | MySQL database |


## 🖼️ Application Preview

| Section         | Screenshot                                     | Description                           |
|-----------------|------------------------------------------------|---------------------------------------|
| **Homepage** | ![image](https://github.com/user-attachments/assets/38412c49-469a-40a8-858e-46c19ca3aad6) | Your presentable page |
| **Posts** | ![image](https://github.com/user-attachments/assets/3f8d5152-1ac9-4817-a3f4-8421b4e592bd) | Whole posts page with paginataion and filters |
| **Post page** | ![image](https://github.com/user-attachments/assets/bc653837-0ae4-48d7-87ce-5b5cb4d12393) | Full post page with comments and likes |
| **Admin Panel** | ![image](https://github.com/user-attachments/assets/b4cc6af8-844c-4320-8a28-f56af7902914) | Usable CMS interface |
| **Mobile View** | ![image](https://github.com/user-attachments/assets/a91970e7-6622-4c3d-9f6d-beea549e5bc2) | Responsive mobile adaptation |
