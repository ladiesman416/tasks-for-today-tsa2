# POS System — TFA4: Who's Allowed In? Sessions and Authentication

**Course:** IT0049 Web System Technologies
**Author:** Kyle Rianne Andrei Dionio ([@ladiesman416](https://github.com/ladiesman416))
**Live site:** http://pos-kyle.gt.tc/tfa4/

A simple Point-of-Sale (POS) web app built with **CodeIgniter 4** and **MySQL**. This activity adds **sessions and authentication** on top of the previous activity (forms, validation and avatar upload), so only logged-in users can see the customers and users pages.

## Features

- **Login page** that checks the username and password against the database
- **Password hashing** with `password_hash()` when saving, and `password_verify()` when logging in
- **Authentication filter** protecting the `/customers` and `/users` routes; logged-out visitors are redirected to the login page
- **Logout** that ends the session
- **Customers and Users management** with new/edit forms, validation and avatar upload with thumbnail (from TFA3)
- **Responsive navbar**, card layout and hover/fade effects (`public/css/style.css`)

## Tech Stack

- PHP 8+ with CodeIgniter 4
- MySQL (MySQLi driver)
- HTML and CSS
- Hosted on InfinityFree

## Project Structure

```
app/
  Config/        Routes, filters, database and app settings
  Controllers/   Page, customer, user and auth logic
  Filters/       Auth filter that guards protected routes
  Models/        CustomerModel, UserModel
  Views/         Pages, forms and layout templates
public/
  css/style.css  Styles
  uploads/       Uploaded avatars
writable/        Sessions, logs and cache
```

## Run Locally

1. Install [XAMPP](https://www.apachefriends.org/) and [Composer](https://getcomposer.org/), then clone this repository.
2. Start **MySQL** in the XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin`, create a database named `pos_system`, and import the exported `.sql` file.
4. Copy `env` to `.env` and set:
   ```
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = pos_system
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```
5. In the project folder, run `composer install` (if the `vendor` folder is missing).
6. Start the server with `php spark serve`, then open the URL it prints. If it uses another port (for example 8081), set `app.baseURL` to match.

## How to Test Authentication

1. While logged out, open `/customers` or `/users`. You should be redirected to the login page.
2. Log in with a wrong password. You should see an error and stay logged out.
3. Log in with a correct account. You should be taken in and the protected pages should load.
4. Click **Logout**, then open `/customers` again. You should be sent back to the login page.

## Deployment

The project is hosted on InfinityFree in the `htdocs/tfa4/` folder. A root `.htaccess` sends requests to the `public/` folder, and the live `.env` uses the hosting database settings and `app.baseURL = 'http://pos-kyle.gt.tc/tfa4/'`.

> The `.env` file is not committed to this repository because it contains database credentials.

## Previous Activities

- TFA1: http://pos-kyle.gt.tc/
- TFA2 (From Arrays to a Real Database): http://pos-kyle.gt.tc/tfa2/
- TFA3 (Forms, Validation and File Upload): (http://pos-kyle.gt.tc/tfa3/)