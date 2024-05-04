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

To start the development server, run: make dev
It will build the docker image and start the apache server.

Then, open http://localhost in your favorite browser.

## Production

TODO