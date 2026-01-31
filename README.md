# Intern Management System (Laravel)

This repository provides a starter structure and guidance for building an Intern Management System with Laravel. The included files show a clean project layout, suggested database schema, and example controllers/views to help you begin quickly.

## Quick start (local setup)

1. Install Laravel (if you do not already have it installed):

```bash
composer create-project laravel/laravel intern-management-system
```

2. Copy the files from this repository into your new Laravel project:

```
app/
├── Http/Controllers/InternController.php
└── Models/Intern.php

database/migrations/
└── 2024_01_01_000000_create_interns_table.php

resources/views/
├── layouts/app.blade.php
└── interns/
    ├── create.blade.php
    ├── edit.blade.php
    └── index.blade.php

routes/
└── web.php
```

3. Configure your database in `.env`, then run migrations:

```bash
php artisan migrate
```

4. Serve the app:

```bash
php artisan serve
```

## What's included

- **Intern model** with fillable properties and date casting.
- **Intern controller** with CRUD actions and validation.
- **Migration** defining an `interns` table for core intern data.
- **Basic Blade views** to list, create, and edit intern records.

For a deeper explanation of the system design, see [docs/laravel-setup.md](docs/laravel-setup.md).
