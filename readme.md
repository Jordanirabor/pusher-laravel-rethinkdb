## Building a realtime Laravel application with RethinkDB and Pusher
This is a demo of a real-time Laravel Todo application built with RethinkDB and Pusher. {LINK}

## Getting started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.
- Clone this repo
- Copy .env.example to .env and update your local environment variable.
- Install all dependencies:
```composer install && npm install```
- Generate a new application key:
```php artisan key:generate```
- Migrate the database tables and seed the database:
```php artisan migrate```
- Update your Pusher App Key in:
```resources/assets/js/app.js```
- Run using your local web server:
```php artisan serve```

### Prerequisite
- A [Pusher Channel](https://pusher.com/channels) application.
- [Laravel](https://laravel.com/docs/master) Installed on your local machine.
- [Composer](https://getcomposer.org/) globally installed.
- [NPM](https://www.npmjs.com/get-npm) installed on your machine.
- [RethinkDB](https://rethinkdb.com/) database.

## Built With
- [Pusher](https://pusher.com/) - APIs to enable real-time communition on application.
- [RethinkDB](https://rethinkdb.com/) - The open-source database for the realtime web.
- [Vue](https://vuejs.org/) - The progressive JavaScript framework.
