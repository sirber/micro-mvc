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

## Development

The code comes with a development server. It includes a MariaDB database. 

Follow these steps:
- Create a `.env` file similar to `.env.sample`.
- Run: `make dev`. It will build the docker image and start the apache server.
- Open http://localhost in your favorite browser.

### Database Migrations

To run the database migrations, make sure the development server is running.

Then, run `make migration-run`.

## Production

TODO