<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://ratnalisa-klinik.ifree.page/assets/img/ratnalisa-logo-full.png" width="100" alt="Ratnalisa Logo">
    </a>
</p>

<h1 align="center">Ratnalisa Patient Registration System</h1>

<p align="center">
    A web-based patient registration and clinic management system
    developed using Laravel.
</p>

<p align="center">
    <a href="https://laravel.com">
        <img src="https://img.shields.io/badge/Laravel-10-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel 10">
    </a>
    <a href="https://www.php.net/">
        <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP 8.1+">
    </a>
    <a href="https://www.mysql.com/">
        <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=flat-square&logo=mysql&logoColor=white" alt="MySQL">
    </a>
    <a href="https://vitejs.dev/">
        <img src="https://img.shields.io/badge/Vite-5.0-646CFF?style=flat-square&logo=vite&logoColor=white" alt="Vite 5.0">
    </a>
</p>

<p align="center">
    <a href="https://www.midtrans.com/">
        <img src="https://img.shields.io/badge/Midtrans-Payment-00AEEF?style=flat-square" alt="Midtrans">
    </a>
    <a href="https://github.com/nico-alfianto/ratnalisa-patient-registration">
        <img src="https://img.shields.io/github/repo-size/nico-alfianto/ratnalisa-patient-registration?style=flat-square" alt="Repository Size">
    </a>
</p>

---

## Live Demo

<p align="center">
    <a href="https://ratnalisa-klinik.ifree.page/" target="_blank">
        <img src="https://img.shields.io/badge/Live%20Demo-Ratnalisa%20Clinic-2ea44f?style=flat-square" alt="Live Demo">
    </a>
</p>

<p align="center">
    <a href="https://ratnalisa-klinik.ifree.page/" target="_blank">
        <strong>Visit Ratnalisa Patient Registration System</strong>
    </a>
</p>

<p align="center">
    <a href="https://ratnalisa-klinik.ifree.page/" target="_blank">
        https://ratnalisa-klinik.ifree.page/
    </a>
</p>

> The system is deployed on a web hosting environment for demonstration and academic project purposes. The application is still under development, so some features may contain minor errors or limitations.

---

## About

**Ratnalisa Patient Registration System** is a web-based application developed for **Ratnalisa Laboratory Clinic and Anatomical Pathology**.

The system is designed to support the digitalization of patient registration and clinic management processes, including medical service registration, examination management, service scheduling, invoice management, and online payment.

This project was developed as a collaborative academic project during the **4th semester of the Information Systems program**.

---

## Project Report

The complete project report and documentation are available in the following document:

<p align="center">
    <a href="https://docs.google.com/document/d/1bXA1tiZzWcYM4Tkzs6UBwy3yt8_7eP7R/edit?usp=sharing" target="_blank">
        <img src="https://img.shields.io/badge/View%20Project%20Report-Google%20Docs-4285F4?style=flat-square&logo=googledocs&logoColor=white" alt="View Project Report">
    </a>
</p>

<p align="center">
    <a href="https://docs.google.com/document/d/1bXA1tiZzWcYM4Tkzs6UBwy3yt8_7eP7R/edit?usp=sharing" target="_blank">
        <strong>View Ratnalisa Project Report</strong>
    </a>
</p>

The document contains the project background, system analysis, design, development process, implementation, testing, and other project documentation.

---

## Features

### Public

* Home page
* About page
* Contact page
* Medical services
* Service details
* Doctor information
* Privacy Policy
* Terms & Conditions

### Patient

* Patient registration
* Login and logout
* Patient dashboard
* Patient profile management
* Update personal information
* Browse medical services
* Medical examination registration
* Edit examination registration
* Examination history
* Invoice list
* Invoice details
* Invoice PDF download
* Online payment
* Payment status handling
* Midtrans payment integration

### Administrator

* Admin dashboard
* Patient management
* Service management
* Doctor management
* Specialty management
* Examination management
* Pending examination management
* Completed examination management
* Invoice management
* Service schedule management
* Religion management
* Education management
* Occupation management

---

## System Overview

The system provides two main user roles:

| Role              | Description                                                                                                              |
| ----------------- | ------------------------------------------------------------------------------------------------------------------------ |
| **Patient**       | Register for examinations, manage personal information, view examination records, access invoices, and process payments. |
| **Administrator** | Manage patients, doctors, services, schedules, examinations, invoices, and supporting master data.                       |

---

## Patient Registration Flow

```text
Patient
   |
   v
Register / Login
   |
   v
Browse Medical Services
   |
   v
Select Medical Service
   |
   v
Submit Examination Registration
   |
   v
Create Payment
   |
   v
Midtrans Payment
   |
   v
Payment Confirmation
   |
   v
Invoice
```

---

## Administrator Workflow

```text
Administrator
      |
      v
Admin Dashboard
      |
      +-------------------+
      |                   |
      v                   v
Master Data          Operational Data
      |                   |
      +----+----+         +----+----+
           |                   |
        Doctors            Examinations
        Services            Invoices
        Specialties         Schedules
        Patients
        Education
        Religion
        Occupation
```

---

## Technology Stack

### Backend

| Technology      | Version / Package |
| --------------- | ----------------- |
| PHP             | 8.1+              |
| Laravel         | 10.x              |
| Laravel Sanctum | 3.3               |
| Guzzle          | 7.2               |
| Laravel Tinker  | 2.8               |

### Frontend & Build Tools

| Technology          | Version / Package |
| ------------------- | ----------------- |
| HTML                | -                 |
| CSS                 | -                 |
| JavaScript          | -                 |
| Vite                | 5.0               |
| Laravel Vite Plugin | 1.0               |
| Axios               | 1.6               |

### Additional Packages

| Package          | Purpose                       |
| ---------------- | ----------------------------- |
| Midtrans PHP SDK | Online payment integration    |
| Laravel DOMPDF   | PDF invoice generation        |
| PHPUnit          | Application testing           |
| Laravel Pint     | Code formatting               |
| Laravel Sail     | Local development environment |

### Database

| Technology         | Purpose                    |
| ------------------ | -------------------------- |
| MySQL              | Relational database        |
| Eloquent ORM       | Database interaction       |
| Laravel Migrations | Database schema management |

---

## Database Structure

The application uses Laravel migrations to manage its relational database structure.

### Main Entities

```text
Users
 |
 +-- Patients
 |
 +-- Medical Examinations
 |       |
 |       +-- Services
 |       |
 |       +-- Doctors
 |       |
 |       +-- Service Schedules
 |
 +-- Payments
 |       |
 |       +-- Invoices
 |
 +-- Supporting Master Data
         |
         +-- Specialties
         +-- Religions
         +-- Education
         +-- Occupations
```

### Main Tables

* `users`
* `layanans`
* `detail_layanans`
* `layanan_details`
* `pemeriksaans`
* `pembayarans`
* `invoices`
* `dokters`
* `spesialis`
* `agamas`
* `pendidikans`
* `pekerjaans`
* `jadwal_layanans`
* `personal_access_tokens`

---

## Payment Integration

The application integrates **Midtrans** for online payment processing.

The general payment process is:

1. Patient selects a medical service.
2. Patient submits an examination registration.
3. The system creates the related payment record.
4. The application prepares a Midtrans transaction.
5. Patient completes the payment through Midtrans.
6. Midtrans sends the transaction result to the application.
7. The application processes the payment status.
8. The patient can access the related invoice.

---

## Invoice Management

The application uses **Laravel DOMPDF** to generate downloadable PDF invoices.

Patients can:

* View invoice information.
* Open invoice details.
* Download invoices as PDF documents.

Administrators can manage invoice records through the administrative dashboard.

---

## Authentication & Authorization

The application implements authentication and role-based access control.

### Authentication

The system provides:

* Patient registration
* Login
* Logout
* Session-based authentication

### Authorization

Different routes and features are protected according to user roles.

```text
                    Authentication
                          |
              +-----------+-----------+
              |                       |
              v                       v
           Patient                 Admin
              |                       |
       Patient Features        Admin Features
```

---

## API

The project includes Laravel API routing through:

```text
routes/api.php
```

The authenticated user endpoint is protected using Laravel Sanctum:

```text
GET /api/user
```

The main application functionality is handled through the web routes in:

```text
routes/web.php
```

---

## Project Structure

```text
ratnalisa-patient-registration/
│
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── api.php
│   ├── console.php
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
├── vite.config.js
└── README.md
```

---

## Installation

### Requirements

Make sure the following software is installed:

* PHP 8.1 or later
* Composer
* Node.js and npm
* MySQL
* Git

### 1. Clone the Repository

```bash
git clone https://github.com/nico-alfianto/ratnalisa-patient-registration.git
```

```bash
cd ratnalisa-patient-registration
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install
```

### 4. Configure Environment

Create a `.env` file from `.env.example`.

#### Windows PowerShell

```powershell
Copy-Item .env.example .env
```

#### Linux / macOS

```bash
cp .env.example .env
```

Configure the database connection in `.env`.

Example:

```env
APP_NAME=Ratnalisa
APP_ENV=local
APP_KEY=
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```

Configure the required Midtrans credentials according to your local environment.

> Never commit the `.env` file or any credentials to the repository.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. Start Laravel Development Server

```bash
php artisan serve
```

### 8. Start Vite

Open another terminal and run:

```bash
npm run dev
```

The application will be available at:

```text
http://127.0.0.1:8000
```

---

## Development Commands

### Run Laravel Server

```bash
php artisan serve
```

### Run Vite

```bash
npm run dev
```

### Build Frontend Assets

```bash
npm run build
```

### Run Migrations

```bash
php artisan migrate
```

### Clear Application Cache

```bash
php artisan optimize:clear
```

### Run Tests

```bash
php artisan test
```

---

## Project Team

<p align="center">
    <strong>Ratnalisa Patient Registration System</strong>
</p>

| Name                          | Role                                   |
| ----------------------------- | -------------------------------------- |
| **Nico Alfianto**             | Project Manager / Team Leader          |
| **Awaludin Al Ayubi**         | UI/UX Designer                         |
| **Marcho Dominggus Timisela** | Frontend Developer & Database Designer |
| **Ikhsan Basuki**             | Backend Developer                      |
| **Nethar Balawan M.**         | Documentation                          |

### Team Responsibilities

#### Nico Alfianto — Project Manager / Team Leader

Responsible for project coordination, system planning, task distribution, progress monitoring, and overall project direction.

#### Awaludin Al Ayubi — UI/UX Designer

Responsible for user interface and user experience design, including interface structure, visual design, and usability considerations.

#### Marcho Dominggus Timisela — Frontend Developer & Database Designer

Responsible for frontend implementation and database structure and design.

#### Ikhsan Basuki — Backend Developer

Responsible for backend development, application logic, database interaction, and core system functionality.

#### Nethar Balawan M. — Documentation

Responsible for project documentation, development records, and supporting documentation.

---

## Academic Context

This project was developed as a collaborative academic project during the **4th semester** of the Information Systems program.

### Courses

* **Information Systems Design**
* **Information Systems Modeling**
* **Web Programming 3**

### Project Focus

The project applies concepts related to:

* Information systems analysis
* System design
* Database modeling
* User interface and user experience
* Web application development
* Role-based access control
* Patient registration
* Online payment integration
* Project management
* Technical documentation

---

## Security

Sensitive configuration should not be committed to the repository.

The following information must remain private:

```text
.env
Database credentials
API keys
Midtrans credentials
Application secrets
Production configuration
```

Use `.env.example` as the configuration template for development.

---

## Project Status

<p align="center">
    <strong>Academic Project</strong>
</p>

This project was developed as a collaborative academic project for the Information Systems program.

The application is currently deployed as a live demonstration and may still contain minor errors or limitations in some features.

---

## License

This project was developed for **academic and educational purposes**.

---

## Author

<p align="center">
    <strong>Nico Alfianto</strong>
</p>

<p align="center">
    Information Systems Student<br>
    Project Manager / Team Leader
</p>

<p align="center">
    <a href="https://github.com/nico-alfianto">
        GitHub Profile
    </a>
</p>
