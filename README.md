# Micro MVC for PHP

Little project to build a simple MCV back-end, for PHP 8!

## Features

- Routing
- Database (pdo)
  - Migrations
  - Repository pattern
- Template engine (twig)
- PSR-4 auto loading

## Data flow

- Index
  - Router
  - Controller
    - Repository
      - Database
    - Template

# Usage

## Routing

Routes are stored in `src/routes.php`. They will be automatically parsed by the `index`.

Exemple:
```php
$routes = array(
  array(
    'endpoint' => '/',
    'controller' => HomeController::class,
    'function' => 'getHome'
  ),
);
```

## Development

The code comes with a development server. It includes a MariaDB database.

Follow these steps:

- Create a `.env` file similar to `.env.sample`.
- Run: `make dev`. It will build the docker image and start the apache server.
- Open http://localhost in your favorite browser.

### Database Migrations

To create a new migration, add a new file like `001_my-migration.sql` into `src/private/migrations`.

To run the database migrations, make sure the development server is running. Then, run `make migration-run`.

## Production

TODO
