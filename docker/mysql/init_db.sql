CREATE DATABASE laravel_blog;

CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'laravelblog_password';

GRANT ALL PRIVILEGES ON `laravel_blog`.* TO 'laravel'@'localhost';