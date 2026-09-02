<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
$userName = isset($_SESSION["user_name"]) ? $_SESSION["user_name"] : "Student";
$userEmail = isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - SmartCampus+</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #0f172a;
            --bg-card: rgba(30, 41, 59, 0.7);
            --accent-purple: #6a11cb;
            --accent-blue: #2575fc;
            --accent-indigo: #6366f1;
            --text-light: #f1f5f9;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Animated background glow */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: -1;
            background: radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.15) 0%, transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(106, 17, 203, 0.15) 0%, transparent 40%);
            pointer-events: none;
        }

        /* Top Navbar */
        .dashboard-nav {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 40px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, #a855f7, #6366f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .user-badge {
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* Dashboard Container */
        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            flex: 1;
            width: 100%;
        }

        /* Welcome Banner */
        .welcome-card {
            background: linear-gradient(135deg, rgba(106, 17, 203, 0.4), rgba(37, 117, 252, 0.4));
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 30px;
            backdrop-filter: blur(12px);
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .welcome-card h2 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        /* Stats Cards */
        .stat-card {
            background: var(--bg-card);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 24px;
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 16px;
        }

        .icon-blue { background: rgba(37, 117, 252, 0.2); color: #60a5fa; }
        .icon-purple { background: rgba(168, 85, 247, 0.2); color: #c084fc; }
        .icon-green { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
        .icon-amber { background: rgba(245, 158, 11, 0.2); color: #fbbf24; }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 14px;
        }

        /* Action Cards */
        .action-card {
            background: var(--bg-card);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 24px;
            margin-top: 30px;
        }

        .action-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            border-radius: 12px;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.25s ease;
            font-weight: 500;
        }

        .action-btn:hover {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.2));
            border-color: rgba(99, 102, 241, 0.5);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .action-btn i {
            font-size: 18px;
            color: #818cf8;
        }

        /* Footer */
        .dashboard-footer {
            text-align: center;
            padding: 20px;
            color: var(--text-muted);
            font-size: 13px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <nav class="dashboard-nav d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <span class="logo-text"><i class="fa-solid fa-graduation-cap me-2"></i>SmartCampus+</span>
            <span class="badge bg-primary bg-opacity-25 text-info px-2 py-1">Student Portal</span>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="user-badge d-none d-md-flex align-items-center gap-2">
                <i class="fa-solid fa-circle-user text-info"></i>
                <span><?= htmlspecialchars($userName) ?></span>
            </div>
            <a href="index.php" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="fa-solid fa-house me-1"></i> Home
            </a>
            <a href="logout.php" class="btn btn-danger btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="dashboard-container">
        
        <!-- Welcome Banner -->
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2>Welcome back, <?= htmlspecialchars($userName) ?>! 👋</h2>
                    <p class="text-white-50 mb-0">
                        <?= !empty($userEmail) ? 'Signed in as ' . htmlspecialchars($userEmail) . ' | ' : '' ?>
                        Access your academic progress, enrolled courses, attendance records, and announcements from your student portal.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <span class="badge bg-success bg-opacity-25 text-success border border-success p-2">
                        <i class="fa-solid fa-circle-check me-1"></i> Account Active
                    </span>
                </div>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon icon-blue">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="stat-value">6</div>
                    <div class="stat-label">Enrolled Courses</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon icon-purple">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div class="stat-value">8.92</div>
                    <div class="stat-label">Current CGPA</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon icon-green">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="stat-value">94.5%</div>
                    <div class="stat-label">Attendance Rate</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon icon-amber">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="stat-value">2</div>
                    <div class="stat-label">Upcoming Exams</div>
                </div>
            </div>
        </div>

        <!-- Quick Action Modules -->
        <div class="action-card">
            <h5 class="mb-4 text-white"><i class="fa-solid fa-compass me-2 text-indigo"></i>Quick Academic Portals</h5>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="action-btn">
                        <i class="fa-solid fa-book"></i>
                        <span>Course Modules & Syllabi</span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="action-btn">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span>Attendance Tracker</span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="action-btn">
                        <i class="fa-solid fa-award"></i>
                        <span>Examination & Grades</span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="action-btn">
                        <i class="fa-solid fa-bullhorn"></i>
                        <span>Department Notices</span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="action-btn">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span>Fee & Fee Receipts</span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="action-btn">
                        <i class="fa-solid fa-id-card"></i>
                        <span>Student Profile Details</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="dashboard-footer">
        &copy; <?= date("Y") ?> SmartCampus+ College Management System. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
