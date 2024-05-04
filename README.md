# Micro MVC for PHP

Little project to build a simple MCV back-end.

## Features

- Routing
- Database (pdo)
  - Migrations
  - Repository pattern
- Template engine (twig)

## Data flow

- Index
  - Router
  - Controller
    - Repository
      - Database
    - Template
