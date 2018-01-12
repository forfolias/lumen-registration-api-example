# Basic User Registration REST Example Using Lumen

## Requirements
Make sure you have installed :
* PHP >= 7.0 (prefer >=7.2)

You probably have already installed the following required PHP extensions:
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension

## Local Setup Instructions

### 1. Install required dependencies
```
$ composer install
```

### 3. Configure project
Copy `.env.example` to `.env` and edit the project settings.

### 4. Apply pending database migrations
```
$ php artisan migrate
```

### 5. Run the application
Instead of running the application through a web server, you can use the built-in PHP server:
```
php -S localhost:5000 -t public
```

### 5. Make a test request
```
$ curl -X POST http://127.0.0.1:5000/register -F name='Full Name' -F email=email@address.com
```

## Running Unit tests
```
$ phpunit
```
