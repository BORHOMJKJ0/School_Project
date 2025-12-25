# School Project 🏫

**A small Laravel API for managing students (CRUD + soft delete).**

---

## Table of Contents 📚

-   [About](#about)
-   [Features](#features)
-   [Tech Stack](#tech-stack)
-   [Requirements](#requirements)
-   [Quickstart — Local Development](#quickstart-—-local-development)
-   [Environment](#environment)
-   [Database & Seeding](#database--seeding)
-   [API Endpoints](#api-endpoints)
-   [Validation & Errors](#validation--errors)
-   [Testing](#testing)
-   [Contributing](#contributing)
-   [License](#license)

---

## About

This repository provides a compact Laravel application that exposes a RESTful API to manage students. It includes validation, resources, soft-delete support (trash/restore/force-delete), and a small seed to bootstrap sample data.

## Features ✅

-   Full CRUD for Student model
-   Input validation with meaningful error responses
-   Soft delete / trash, restore and force delete operations
-   API resources for consistent JSON responses
-   Database factory & seeder for sample data

## Tech Stack 🔧

-   PHP 8.1+
-   Laravel 10.x
-   Composer
-   Node.js + NPM (for frontend assets, if needed)
-   MySQL / SQLite (or any DB supported by Laravel)

## Requirements ⚙️

-   PHP ^8.1
-   Composer
-   Node.js (LTS recommended) + npm
-   Database (MySQL, Postgres, SQLite, etc.)

## Quickstart — Local Development 🚀

Clone the repo, install dependencies, configure your .env, migrate and seed the database:

Windows (PowerShell):

```powershell
git clone <repo-url> school-project
cd school-project
Copy-Item .env.example .env
composer install
npm install
php artisan key:generate
# Update .env database settings
php artisan migrate --seed
npm run dev
php artisan serve --host=127.0.0.1 --port=8000
```

macOS / Linux (bash):

```bash
git clone <repo-url> school-project
cd school-project
cp .env.example .env
composer install
npm install
php artisan key:generate
# Update .env database settings
php artisan migrate --seed
npm run dev
php artisan serve --host=127.0.0.1 --port=8000
```

The API will be available at: `http://127.0.0.1:8000/api` by default.

## Environment 📁

Minimal `.env` entries you should set:

```env
APP_NAME=SchoolProject
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=school_db
DB_USERNAME=root
DB_PASSWORD=secret
```

## Database & Seeding 🌱

-   Migration for `students` table located in `database/migrations`
-   Factory: `database/factories/StudentFactory.php`
-   Seeder: `database/seeders/StudentSeeder.php` (creates 5 sample students)

To refresh the database and seed:

```bash
php artisan migrate:fresh --seed
```

## API Endpoints 🔗

Base URL: `{{APP_URL}}/api`

| Method |                       Endpoint | Description                                            |
| ------ | -----------------------------: | ------------------------------------------------------ |
| GET    |                    `/students` | List all students                                      |
| GET    |               `/students/{id}` | Show a student by ID                                   |
| POST   |                    `/students` | Create a new student (see payload)                     |
| PATCH  |               `/students/{id}` | Update a student (partial)                             |
| DELETE |               `/students/{id}` | Soft-delete a student                                  |
| GET    |              `/students/trash` | List soft-deleted (trashed) students                   |
| GET    |   `/students/trashShow/{name}` | Show a trashed student by _name_ (special binding)     |
| PATCH  |     `/students/restore/{name}` | Restore a trashed student (use trashed student's name) |
| DELETE | `/students/forceDelete/{name}` | Permanently delete a trashed student (use name)        |

Important: The trash/restore/forceDelete/trashShow routes use a custom route binding that resolves a trashed student by **name** (not ID). This is defined in `StudentController` constructor.

### Example: Create student (curl)

```bash
curl -X POST http://127.0.0.1:8000/api/students \
  -H 'Content-Type: application/json' \
  -d '{"name":"Jane Doe","age":15,"class":"9A","number":101,"avg":82}'
```

### Resource format

Responses for students use `App\Http\Resources\StudentResource` and return:

```json
{
    "id": 1,
    "name": "Jane Doe",
    "age": 15,
    "number": 101,
    "class": "9A",
    "avg": 82,
    "Date_of_apply_to_school": "2025-12-25 14:35"
}
```

## Validation & Errors ⚠️

Create (`POST /students`) validation rules (enforced by `StudentRequest`):

-   name: required|string|max:250|unique:students,name
-   age: required|numeric|max:20
-   class: required|string|max:150
-   number: required|numeric|unique:students,number
-   avg: required|numeric|max:100

Validation failures return HTTP 400 with a JSON body:

```json
{
    "message": "Validation error",
    "errors": { "name": ["The name field is required."] }
}
```

The `update` endpoint validates partially and also returns a 400 on validation errors.

## Testing ✅

Run the test suite with:

```bash
# Run Laravel/PHPUnit tests
php artisan test
# or
vendor/bin/phpunit
```

## Useful NPM / Composer scripts

-   `composer install`
-   `npm install`
-   `npm run dev` — compile assets

## Contributing 🤝

-   Fork the repo and open a pull request with a clear description
-   Run tests and linters before submitting
-   Use `php artisan pint` for formatting (pint is included as dev dependency)

## License 📄

This project is licensed under the **MIT** License (see `composer.json`).

---

If you want, I can also add an OpenAPI/Swagger spec or a Postman collection for the API. Want me to add that? 💡
