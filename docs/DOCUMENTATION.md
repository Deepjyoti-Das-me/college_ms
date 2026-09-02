# 📘 SmartCampus+ | Comprehensive System Documentation

## 1. Executive Summary
**SmartCampus+** is a web-based College Management & Student Portal System designed to streamline campus management, student onboarding, authentication, and academic records access. Built with standard PHP, MySQL, and modern front-end technologies (CSS3 Glassmorphism, Bootstrap 5, AOS animations), it offers an intuitive and responsive portal for academic institutions.

---

## 2. System Architecture

SmartCampus+ follows a 3-Tier Web Architecture:

```
+-------------------------------------------------------------+
|                      Client Layer (Browser)                 |
|   HTML5, CSS3 Glassmorphism, JavaScript, Bootstrap 5, AOS   |
+------------------------------+------------------------------+
                               |
                               | HTTP / HTTPS Requests
                               v
+-------------------------------------------------------------+
|               Application / Business Logic Layer            |
|       PHP 8+ (Session Control, Authentication, Routing)     |
|   - index.php        -> Landing Page & Features             |
|   - registration.php -> Validation & User Creation          |
|   - login.php        -> Authentication & Session Init       |
|   - dashboard.php    -> Authenticated User Portal           |
|   - logout.php       -> Session Destruction & Redirect      |
|   - database.php     -> Centralized MySQL Connection        |
+------------------------------+------------------------------+
                               |
                               | MySQLi Prepared Queries
                               v
+-------------------------------------------------------------+
|                      Data Storage Layer                     |
|                 MySQL / MariaDB (login_register)            |
|   - Table: users (Credentials, Hashes, Metadata)            |
+-------------------------------------------------------------+
```

---

## 3. Database Schema

- **Database Name**: `login_register`
- **Engine**: `InnoDB`
- **Character Set**: `utf8mb4`
- **Collation**: `utf8mb4_unicode_ci`

### Table: `users`
| Column Name | Data Type | Key / Constraint | Description |
|---|---|---|---|
| `id` | `INT(11)` | `PRIMARY KEY, AUTO_INCREMENT` | Unique identifier for each registered account |
| `full_name` | `VARCHAR(128)` | `NOT NULL` | Full Name of the student / user |
| `email` | `VARCHAR(255)` | `NOT NULL, UNIQUE` | Unique email address used for sign-in |
| `password` | `VARCHAR(255)` | `NOT NULL` | Secure password hash generated via `password_hash()` |
| `created_at` | `TIMESTAMP` | `DEFAULT CURRENT_TIMESTAMP` | Account registration timestamp |

---

## 4. Key Functional Modules

### 4.1 Landing Page (`index.php`)
- Modern video hero banner featuring background campus video (`images/classroom-bg.mp4`).
- Scroll-triggered reveal animations powered by **AOS (Animate On Scroll)**.
- Feature highlight cards for Student Management, Course Records, and Performance Tracking with responsive CSS hover effects.
- Clean navigation bar and call-to-action buttons.

### 4.2 User Registration (`registration.php`)
- **Front-end / Back-end Validation**:
  - Required fields check (Full Name, Email, Password, Confirm Password).
  - RFC-compliant email validation via PHP `filter_var($email, FILTER_VALIDATE_EMAIL)`.
  - Password minimum length verification (>= 8 characters).
  - Password and confirm password equality check.
  - Duplicate email detection via SQL query.
- **Security**:
  - Passwords hashed using industry-standard BCRYPT (`PASSWORD_DEFAULT`).
  - Parameterized queries using prepared statements (`mysqli_stmt_bind_param`) to prevent SQL Injection.

### 4.3 User Authentication & Login (`login.php`)
- Form inputs for registered email and password.
- Verification using PHP `password_verify($password, $user["password"])`.
- Secure session initiation (`$_SESSION["user"]`, `$_SESSION["user_name"]`, `$_SESSION["user_email"]`).
- Automatic redirection if the user is already authenticated.

### 4.4 Student Dashboard (`dashboard.php`)
- Protected route: verifies `isset($_SESSION["user"])`; unauthenticated visits redirect to `login.php`.
- Displays customized user greeting with session details.
- Overview metric cards (Enrolled Courses, CGPA, Attendance %, Upcoming Exams).
- Quick navigation shortcuts for Course Modules, Attendance Tracker, Results, Department Notices, and Fees.
- Logout trigger and Home shortcut.

### 4.5 Session Termination (`logout.php`)
- Flushes and destroys active PHP session data (`session_destroy()`).
- Redirects user back to `login.php`.

---

## 5. Security Measures

1. **Password Hashing**: Implements standard PHP `password_hash()` utilizing adaptive bcrypt hashing algorithm. Passwords are never stored in plaintext.
2. **SQL Injection Defense**: Uses MySQLi Prepared Statements for user registration and authentication lookups.
3. **Session Guards**: Protected pages (`dashboard.php`) strictly enforce session checks prior to rendering sensitive UI.
4. **Input Sanitization**: Email and text fields are trimmed and sanitized against XSS attacks using `htmlspecialchars()`.

---

## 6. Installation & Deployment Guide

### Prerequisites:
- **XAMPP / WAMP / MAMP / LAMP** installed with:
  - PHP 7.4 or PHP 8.x
  - Apache Web Server
  - MySQL / MariaDB Server

### Setup Steps:
1. Place the project directory into your web root:
   - For XAMPP: `C:\xampp\htdocs\college_ms` (or `H:\xampp\htdocs\college_ms`)
2. Start **Apache** and **MySQL** modules from the XAMPP Control Panel.
3. Open phpMyAdmin (`http://localhost/phpmyadmin`).
4. Import the `database.sql` script provided in the root folder, or execute the SQL commands directly.
5. Access the application in your browser:
   - `http://localhost/college_ms/index.php`

---

## 7. Future Enhancements & Roadmap
- [ ] Role-Based Access Control (Admin, Faculty, Student, Staff).
- [ ] Attendance Management & Automated Report Generation.
- [ ] Online Course Registration and Fee Payment Gateway.
- [ ] Internal Marks & Exam Result Publishing System.
- [ ] Real-time Notices and Notification Center.
