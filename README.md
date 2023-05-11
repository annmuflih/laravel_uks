<div align="center">
<img src="/img/logo.png" alt="Logo"/>
<h1>UKS</h1>

<h4>This is a Laravel project about UKS (Unit Kesehatan Sekolah) application for schools in Indonesia.</h4>

<img src="/img/prev.jpeg" height=100 alt="Prev"/>

Made with :
<p>
    <a href="https://laravel.com/">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/></a>
    <a href="https://getbootstrap.com">
    <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white"/></a>
</p>
</div>

## Features


## How To Use

1 - Clone this repository

    git clone https://github.com/rodhisz/laravel_uks.git
2 - Run

    composer install
3 - Run
for macOS or linux

    cp .env.example .env

for windows

    copy .env.example .env

4 - Open your .env file and change the database name (`DB_DATABASE`) to whatever you have, username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration.

5 - Run

    php artisan key:generate

6 - Run

    php artisan migrate
7 - Run

    php artisan db:seed
8 - And last run

    php artisan serve

Happy Coding ✨



