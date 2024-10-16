<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

![image](https://github.com/user-attachments/assets/4f998faf-01e2-48ec-b7ee-90d0ef252a11)

## MANAJEMEN KONTEN
### Instalasi

Clone Repo:

```sh
git clone https://github.com/sukmaajidigital/filemanagement && cd filemanagement
```

Install package & module:

```sh
composer install
```

Copy .env:

```sh
cp .env.example .env
```

Symlink Storage:

```sh
php artisan storage:link
```

Database : Migrate

```sh
php artisan migrate # press Y & auto create database form .env
```

Generate Key:

```sh
php artisan key:generate
```

Run Apps:

```sh
php artisan serve
```

### Documentation

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
