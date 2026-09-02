# 🎓 SmartCampus+ (College Management System)

A simple, responsive, and secure College Management & Student Portal built using **PHP** and **MySQL**.

---

## 📥 Project Downloads & Resources (For Students & Juniors)

> 💡 **Quick Access:** You can view or download the complete project report and presentation slides directly from the links below:

| Resource | Format | Link |
| :--- | :---: | :--- |
| 📄 **Project Documentation** | `PDF` | [📥 **Download Documentation (PDF)**](docs/documentation.pdf) |
| 📊 **Project Presentation** | `PPTX` | [📥 **Download Presentation (PPT)**](docs/presentation.pptx) |
| 🗄️ **Database Schema** | `SQL` | [📥 **Download database.sql**](database.sql) |

*(Place your `documentation.pdf` and `presentation.pptx` inside the `docs/` folder to enable direct downloads).*

---

## 🚀 Key Features

- **Home & Landing Page:** Clean UI with video banner and course info cards.
- **Student Registration:** Sign up with name, email, and password validation.
- **Secure Login:** Encrypted passwords (`password_hash`) and session-guarded dashboard.
- **Student Dashboard:** Responsive portal displaying student overview and quick academic links.

---

## 🛠️ Tech Stack

- **Backend:** PHP (8.x)
- **Database:** MySQL / MariaDB (`login_register`)
- **Frontend:** HTML5, CSS3 (Glassmorphism), JavaScript, Bootstrap 5

---

## ⚙️ Quick Setup Guide (XAMPP)

### 1. Copy Files to Server
Copy or clone this folder into your XAMPP `htdocs` directory:
```
C:\xampp\htdocs\college_ms
```

### 2. Start Services
Open **XAMPP Control Panel** and start **Apache** and **MySQL**.

### 3. Import Database
1. Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in your browser.
2. Click **Import** > Choose **`database.sql`** > Click **Go**.
*(This creates the `login_register` database and `users` table).*

### 4. Run the Project
Open your browser and visit:
```
http://localhost/college_ms/index.php
```

---

## 📁 File Structure

```
college_ms/
├── docs/                     # 📥 Put your PDF report & PPT slides here
│   ├── documentation.pdf     # Project Documentation
│   └── presentation.pptx     # Project Presentation (PPT)
├── images/                   # Media assets & icons
│   ├── classroom-bg.mp4
│   ├── course.png
│   ├── result.png
│   └── student.png
├── dashboard.php             # Student dashboard page
├── database.php              # MySQL database connection
├── database.sql              # Database setup script
├── index.php                 # Home / Landing page
├── login.php                 # Student login page
├── login.css                 # Login styling
├── logout.php                # Logout handler
├── registration.php          # Student registration page
├── registration.css          # Registration styling
├── style.css                 # Main stylesheet
└── README.md
```

---

## 📄 License
Open source for educational purposes. Feel free to use and customize!
