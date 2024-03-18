<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel 10 Scaffold

Quickly set up skeleton for your Laravel 10.x app with env:
- php 8.2.16
- node v20.11.1 (LTS)

## Features:
- Auto check coding convention using sonarqube with github action
- Pre-install Breeze & Blade: https://laravel.com/docs/10.x/starter-kits#breeze-and-blade
- Authentication by email & password

## Install:
1. Clone this project
2. Run `composer install`
3. Run `npm install & npm run dev`
4. Create .env file : `cp .env.example .env`
5. Generate app key : `php artisan key:generate`
6. Migrate database: `php artisan migrate`
7. Seed database: `php artisan db:seed`
8. Open up web server: `php artisan serve`
9. Browse app: `localhost:8000`
10. Login using test account: Email: `test@haposoft.com` / Password: `Abc@123456`

## Swagger
1.  Generate Swagger document

```
$ php artisan l5-swagger:generate
```
2. Delete cache: `php artisan cache:clear` & `php artisan config:clear`
3. Run: `http://localhost:8000/api/documentation`

## Technical support:
- [Facebook Group](https://www.facebook.com/laravelvn/)

## License

[MIT license](https://opensource.org/licenses/MIT).
