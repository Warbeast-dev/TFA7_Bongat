-- Import once into a NEW, EMPTY InfinityFree MySQL database using phpMyAdmin.
-- This export matches the included migrations and seeders; it never drops existing tables.
SET NAMES utf8mb4;
CREATE TABLE `customers` (
 `id` bigint unsigned NOT NULL AUTO_INCREMENT,
 `full_name` varchar(100) NOT NULL,
 `email` varchar(150) NOT NULL,
 `phone` varchar(30) NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `users` (
 `id` bigint unsigned NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `full_name` varchar(100) NOT NULL,
 `avatar` varchar(255) DEFAULT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`), UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `migrations` (
 `id` int unsigned NOT NULL AUTO_INCREMENT,
 `migration` varchar(255) NOT NULL,
 `batch` int NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `customers` (`full_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
('Maria Santos', 'maria.santos@example.com', '09170001001', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('Juan Dela Cruz', 'juan.delacruz@example.com', '09170001002', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('Andrea Reyes', 'andrea.reyes@example.com', '09170001003', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('Paolo Garcia', 'paolo.garcia@example.com', '09170001004', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('Camille Mendoza', 'camille.mendoza@example.com', '09170001005', '2026-10-31 00:00:00', '2026-10-31 00:00:00');
INSERT INTO `users` (`username`, `full_name`, `created_at`, `updated_at`) VALUES
('msantos', 'Maria Santos', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('jdelacruz', 'Juan Dela Cruz', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('areyes', 'Andrea Reyes', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('pgarcia', 'Paolo Garcia', '2026-10-31 00:00:00', '2026-10-31 00:00:00'),
('cmendoza', 'Camille Mendoza', '2026-10-31 00:00:00', '2026-10-31 00:00:00');
INSERT INTO `migrations` (`migration`, `batch`) VALUES ('2026_10_31_000001_create_customers_table', 1), ('2026_10_31_000002_create_users_table', 1), ('2026_11_05_000003_add_avatar_to_users_table', 1);
