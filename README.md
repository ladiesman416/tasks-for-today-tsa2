# Tasks for Today — TSA2: Full CRUD and Authentication

**Course:** IT0049 Web System Technologies
**Author:** Kyle Rianne Andrei Dionio ([@ladiesman416](https://github.com/ladiesman416))
**Live site:** _add your hosted link here_

A task management web app built with **CodeIgniter 4** and **MySQL**. Anyone can view the public pages, but only a logged-in user can create, edit or delete tasks. Deleting a task is a **soft delete**: the row stays in the database and is only hidden.

## Features

- **Public pages:** Welcome (today's tasks), Task List, Profile and About
- **Login and logout** with hashed passwords (`password_hash()` / `password_verify()`)
- **Authentication filter** that redirects logged-out visitors to the login page when they try to create, edit or delete a task
- **New Task form** (`/tasks/new`) with validation: `title` and `task_date` are required
- **Edit Task page** (`/tasks/edit/{id}`) with the same validation
- **Soft delete:** the Delete button sets `is_archived = 1`; archived tasks no longer appear on the Welcome page or the Task List
- **Responsive design** with a navbar that collapses on small screens and full-width buttons on phones

## Tech Stack

- PHP 8+ with CodeIgniter 4
- MySQL (MySQLi driver)
- HTML and CSS

## Routes

| Method | URL                   | Access     | Purpose                    |
| ------ | --------------------- | ---------- | -------------------------- |
| GET    | `/`                   | Public     | Welcome page               |
| GET    | `/tasks`              | Public     | Task List (not archived)   |
| GET    | `/profile`            | Public     | Profile                    |
| GET    | `/about`              | Public     | About                      |
| GET    | `/login`              | Public     | Login form                 |
| POST   | `/login`              | Public     | Check credentials          |
| GET    | `/logout`             | Public     | End the session            |
| GET    | `/tasks/new`          | Login only | New Task form              |
| POST   | `/tasks/create`       | Login only | Save a new task            |
| GET    | `/tasks/edit/{id}`    | Login only | Edit Task form             |
| POST   | `/tasks/update/{id}`  | Login only | Save changes               |
| POST   | `/tasks/archive/{id}` | Login only | Soft delete (archive) task |

## Database

The database export is in `database/tasks_tsa2.sql`. It creates two tables:

- `users`: `id`, `username`, `password` (hashed) and the other user columns
- `tasks`: `id`, `title`, `description`, `task_date`, `is_archived` (default `0`), `created_at`, `updated_at`

## Run Locally

1. Install [XAMPP](https://www.apachefriends.org/) and [Composer](https://getcomposer.org/), then clone this repository.
2. Start **MySQL** in the XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin`, create a database named `tasks_tsa2`, and import `database/tasks_tsa2.sql`.
4. Copy `env` to `.env` and set:
   ```
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = tasks_tsa2
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```
5. Run `composer install` if the `vendor` folder is missing.
6. Start the server with `php spark serve` and open the URL it prints. If it uses another port (for example 8081), set `app.baseURL` to match.

## Demo Account

| Username              | Password              |
| --------------------- | --------------------- |
| _add the username_    | _add the password_    |

## Access Control Test

1. Logged out, open `/tasks/new`. You are redirected to the login page.
2. Logged out, open `/tasks/edit/1`. You are redirected to the login page.
3. Logged out, `/`, `/tasks`, `/profile` and `/about` still load.
4. Log in with the demo account, then submit the New Task form with empty fields. Validation errors appear for the title and date.
5. Create a task, edit it, then delete it. It disappears from the Welcome page and the Task List, but the row stays in the `tasks` table with `is_archived = 1`.
6. Log out and open `/tasks/new` again. You are redirected to the login page.

## Deployment

> The `.env` file is not committed to this repository because it contains database credentials.

_Describe your hosting here (provider, folder and live URL) once the site is deployed._