-- =======================================================
-- SmartCampus+ / College Management System Database Schema
-- Database Name: `login_register`
-- =======================================================

CREATE DATABASE IF NOT EXISTS `login_register` 
DEFAULT CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE `login_register`;

-- -------------------------------------------------------
-- Table structure for table `users`
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(128) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------
-- Optional: Sample initial test user (Password: password123)
-- -------------------------------------------------------
INSERT INTO `users` (`full_name`, `email`, `password`) 
SELECT 'Admin User', 'admin@smartcampus.edu', '$2y$10$e0MYzXyV0v.R2yGvM1wFLe9dC8Q0M3zHjR3eA9bW3yXzQ3mF5p6nK'
WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `email` = 'admin@smartcampus.edu');
