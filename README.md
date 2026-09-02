# 🎓 SmartCampus+ | College Management System

<p align="center">
  <img src="images/student.png" alt="SmartCampus+ Logo" width="100" />
</p>

<p align="center">
  <strong>A Modern, Secure, and Responsive College & Student Management Web Platform</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP Badge" />
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL Badge" />
  <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap Badge" />
  <img src="https://img.shields.io/badge/CSS3-Glassmorphism-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3 Badge" />
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License Badge" />
</p>

---

## 📖 Table of Contents
- [✨ Key Features](#-key-features)
- [📚 Project Documentation & PPT Presentation](#-project-documentation--ppt-presentation)
- [🛠️ Tech Stack](#️-tech-stack)
- [📂 Project Directory Structure](#-project-directory-structure)
- [🗄️ Database Schema](#️-database-schema)
- [🚀 Getting Started & Installation](#-getting-started--installation)
- [🔒 Security Implementations](#-security-implementations)
- [🗺️ Future Roadmap](#️-future-roadmap)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)

---

## ✨ Key Features

- **🌐 Interactive Landing Page**: Features a background video hero section, responsive navbar, and scroll-triggered animations (AOS) showcasing academic modules.
- **🔐 Secure User Registration**: Robust client and server-side validation with real-time error handling, email format validation, and duplicate account checks.
- **🛡️ Encrypted Authentication**: Passwords hashed using industry-standard `BCRYPT` (`password_hash()`) and verified via `password_verify()`.
- **📊 Modern Student Dashboard**: Dark-mode glassmorphism interface displaying student greetings, academic KPIs (Courses, CGPA, Attendance, Exams), and quick-access portal tiles.
- **🔒 Session Guards**: Prevents unauthenticated access to protected pages with automatic redirection.
- **📱 Fully Responsive**: Optimized for seamless viewing on desktops, tablets, and smartphones.

---

## 📚 Project Documentation & PPT Presentation

Comprehensive project documentation and presentation slides are available directly in this repository:

| Document | Description | Link |
|:---|:---|:---|
| 📘 **Complete System Documentation** | Detailed architecture, functional modules, database ER dictionary, security analysis, and deployment steps. | [**View Documentation**](docs/DOCUMENTATION.md) |
| 📊 **Project Presentation (PPT Deck)** | Slide-by-slide project presentation structure, speaker notes, demo walkthrough, and Viva points. | [**View Presentation (PPT)**](docs/PRESENTATION.md) |

---

## 🛠️ Tech Stack

### **Backend & Database**
- **PHP 8.x**: Server-side logic, session handling, and validation.
- **MySQL / MariaDB**: Relational database storage.
- **MySQLi with Prepared Statements**: SQL injection defense.

### **Frontend & Styling**
- **HTML5 & CSS3**: Modern semantic layout with custom Glassmorphism styling.
- **Bootstrap 5.3**: Responsive grid layout and UI utility classes.
- **AOS (Animate On Scroll)**: Smooth scroll reveal animations.
- **Font Awesome 6**: Vector icons for intuitive user navigation.

---

## 📂 Project Directory Structure

```
college_ms/
├── docs/                         # 📚 Project Documentation & Presentation
│   ├── DOCUMENTATION.md          # Complete Technical Documentation
│   └── PRESENTATION.md           # PPT Presentation Deck & Speaker Notes
├── images/                       # 🖼️ Media & Static Assets
│   ├── classroom-bg.mp4          # Hero section background video
│   ├── course.png                # Course module graphic
│   ├── result.png                # Performance tracking graphic
│   └── student.png               # Student management graphic
├── .gitignore                    # Git ignore file for temp/cache files
├── dashboard.php                 # 📊 Authenticated Student Portal & KPIs
├── database.php                  # 🔌 Centralized MySQL database connection
├── database.sql                  # 🗄️ Database schema & table initialization script
├── index.php                     # 🏠 Main landing page
├── login.css                     # 🎨 Stylesheet for login form
├── login.php                     # 🔑 User login & authentication logic
├── logout.php                    # 🚪 Session destruction & logout handler
├── README.md                     # 📖 Project overview & guide
├── registration.css              # 🎨 Stylesheet for registration form
├── registration.php              # 📝 New user registration & validation
└── style.css                     # 🎨 Global stylesheet & animations
```

---

## 🗄️ Database Schema

The system uses a centralized database named **`login_register`**.

### `users` Table Structure
```sql
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(128) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

---

## 🚀 Getting Started & Installation

Follow these steps to set up and run the project locally on your machine using **XAMPP**:

### Step 1: Clone or Copy the Repository
Clone this repository to your local web server root directory:
```bash
# For XAMPP (Windows):
git clone https://github.com/your-username/college_ms.git C:/xampp/htdocs/college_ms
```

### Step 2: Start Apache and MySQL
1. Launch the **XAMPP Control Panel**.
2. Click **Start** for both **Apache** and **MySQL** modules.

### Step 3: Import the Database
1. Open your browser and navigate to **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Click on **Import** in the top navigation bar.
3. Choose the [`database.sql`](database.sql) file located in the project root and click **Go** / **Import**.
4. *(Alternatively)* Create a database named `login_register` and execute the SQL script.

### Step 4: Verify Database Connection
Check [`database.php`](database.php) and ensure database credentials match your local MySQL configuration:
```php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";
```

### Step 5: Launch the Application
Open your browser and visit:
```
http://localhost/college_ms/index.php
```

---

## 🔒 Security Implementations

- **🛡️ Cryptographic Password Hashing**: Passwords are never saved in cleartext. Hashing is performed using `password_hash($password, PASSWORD_DEFAULT)` and verified using `password_verify()`.
- **💉 SQL Injection Prevention**: Database queries use parameterized prepared statements (`mysqli_stmt_prepare` and `mysqli_stmt_bind_param`).
- **🛡️ Session Protection**: Authenticated dashboards strictly check `$_SESSION["user"]` before rendering, redirecting unauthorized users.
- **🧹 Input Sanitization**: Form inputs are validated and sanitized to guard against XSS (Cross-Site Scripting).

---

## 🗺️ Future Roadmap

- [ ] Multi-Role Access Control (Admin, Faculty, HOD, and Student roles).
- [ ] Attendance Tracking system with automated percentage alerts.
- [ ] Exam & Grade card publishing module.
- [ ] Integrated Online Fee Payment Gateway (Razorpay/Stripe).
- [ ] Real-time Campus Notices & Push Notifications.

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!
1. Fork the Project.
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`).
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the Branch (`git push origin feature/AmazingFeature`).
5. Open a Pull Request.

---

## 📄 License

This project is licensed under the **MIT License** — feel free to use and modify it for educational and institutional purposes.
