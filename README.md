# Laravel Privileges Admin Panel
This is Laravel 5.5 admin panel starter project with features to manage users, roles, and permissions.

I make this because I don't want build those features over and over again everytime I start new project. DRY (Don't Repeat Yourself). As we know, users-roles-permissions are basic feature that must be exists in many projects.

![screenshots_gif](https://gfycat.com/ImpassionedForcefulCrocodile)

## Features
- Permissions: Browse, View, Add, Edit, Delete. 
- Roles: Browse, View, Add, Edit, Delete.
- User: Browse, View, Add, Edit, Delete.
- Auth: Login & Logout.
- BreadController to minimize repitition in making CRUD/BREAD.

## Usage
This is not a Laravel Package. This is full laravel project and you do the rest depend on your project requirement.

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit based on your environment
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` (it has some master data)
- That's it. Access the project URL and login with this default credentials: `admin@admin.com` - `abc123`.

## Based On
This project based on this package/library:
- [acacha adminlte-laravel](https://github.com/acacha/adminlte-laravel)
- [spatie laravel-permission](https://github.com/spatie/laravel-permission)
- [yajra laravel-datatables](https://github.com/yajra/laravel-datatables)
- [iCheck](http://icheck.fronteed.com)
- [Bootstrap Notify](http://bootstrap-notify.remabledesigns.com)

Many thanks to them!
