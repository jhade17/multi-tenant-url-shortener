# Multi Tenant URL Shortener

A simple multi-tenant URL Shortener application built using Laravel 12.

## Features

* Multi Company Support
* Three Roles:

  * Super Admin
  * Admin
  * Member
* Invitation based user onboarding
* URL Shortener
* Public URL Redirection
* URL Hit Counter
* Team Members Listing
* Company based data isolation

---

## Tech Stack

* PHP 8.3+
* Laravel 12
* Laravel Breeze (Authentication Scaffolding)
* MySQL
* Blade
* Tailwind CSS

---

## Clone Repository

```bash
git clone https://github.com/jhade17/multi-tenant-url-shortener.git
```

Move into project directory:

```bash
cd multi-tenant-url-shortener
```

---

## Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

---

## Authentication Setup

This project uses **Laravel Breeze** for authentication scaffolding.

Breeze was installed using:

```bash
composer require laravel/breeze --dev

php artisan breeze:install blade

npm install

npm run build
```

The authentication flow was further customized to support:

* Role based login redirection
* Invitation based onboarding
* Super Admin, Admin and Member roles

---

## Environment Setup

Copy environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## Database Setup

Create a MySQL database:

```text
url_shortener
```

Update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=
```

---

## Run Migration and Seeder

```bash
php artisan migrate --seed
```

This command will:

* Create all required tables
* Seed the default Super Admin account

---

## Build Frontend Assets

For development:

```bash
npm run dev
```

Or build production assets:

```bash
npm run build
```

---

## Run Application

```bash
php artisan serve
```

Application URL:

```text
http://127.0.0.1:8000
```

---

## Default Super Admin Credentials

Email:

```text
superadmin@gmail.com
```

Password:

```text
12345678
```

---

## Invitation Flow

1. Super Admin invites an Admin and creates a new Company.
2. Company and Invitation records are created.
3. Admin accepts the invitation and sets a password.
4. Admin logs in and can invite Members.
5. Members accept invitations and log in.

---

## URL Shortener Flow

1. Admin or Member creates a Short URL.
2. A unique short code is generated.

Example:

Long URL

```text
https://google.com
```

Short URL

```text
http://127.0.0.1:8000/shorturl/abc123
```

3. Visiting the short URL redirects to the original URL.
4. URL hit count is incremented automatically.

---

## AI Usage

The following AI tools were used only for assistance:

### ChatGPT

* Understanding Laravel concepts
* Syntax lookups
* Laravel best practices
* Debugging assistance

### Antigravity

* Syntax lookups
* Laravel best practices
* Debugging assistance

All business logic, database design, application flow and implementation decisions were reviewed, understood and implemented manually.
