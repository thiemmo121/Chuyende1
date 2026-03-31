# Laravel Assignment Suite

This workspace contains a Laravel-style source code submission for the following topics:

1. Student management
2. Product / inventory management
3. Course registration with credit rules
4. Order system with order items and status
5. Booking system with conflict checks

## Main stack

- Laravel Framework
- MVC: Route -> Controller -> Model -> View
- Migration + MySQL
- Blade + Bootstrap
- Validation in controllers

## Notes

- Forms include `@csrf`.
- Validation is handled server-side.
- The interface uses Bootstrap CDN for quick submission.
- If you prefer importing MySQL manually, use [laravel.sql](laravel.sql) at the project root.
- The SQL file now includes demo records for all 5 modules.
- You can also run `php artisan db:seed` after migration to load the same sample data.

## Suggested setup

If you want to run this as a real Laravel app, place these files into a fresh Laravel 11 project, run migrations, then seed or insert sample data manually.
