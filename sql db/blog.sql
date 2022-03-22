-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 02:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'TECHNOLOGY', '2021-10-26 17:20:59', '2021-10-26 17:32:51'),
(3, 'VIDEOS', '2021-10-26 17:21:05', '2021-10-26 17:33:01'),
(4, 'DISCUSSIONS', '2021-10-26 17:21:14', '2021-10-26 17:33:11'),
(5, 'TUTORIALS', '2021-10-26 17:21:22', '2021-10-26 17:33:20'),
(6, 'NEWSLETTER', '2021-10-26 17:21:26', '2021-10-26 17:33:30'),
(7, 'NEWS', '2021-10-30 14:54:56', '2021-10-30 20:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2021_09_22_154446_create_post_tag_table', 2),
(106, '2014_10_12_000000_create_users_table', 3),
(107, '2014_10_12_100000_create_password_resets_table', 3),
(108, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(109, '2019_08_19_000000_create_failed_jobs_table', 3),
(110, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(111, '2021_09_19_011527_create_sessions_table', 3),
(112, '2021_09_19_033518_create_categories_table', 3),
(113, '2021_09_19_070359_create_posts_table', 3),
(114, '2021_09_20_133207_create_tags_table', 3),
(115, '2021_09_23_091847_create_posts_tags_table', 3),
(116, '2021_10_02_131840_create_profiles_table', 3),
(117, '2021_10_21_021145_create_settings_table', 3),
(118, '2022_01_10_225540_insert_user_id_column', 4),
(119, '2022_01_11_014733_insert_user_id_column', 5),
(120, '2022_01_11_024409_insert_author_info_column', 6),
(121, '2022_01_16_062214_insert_content_column', 7),
(122, '2022_01_17_011022_insert_title_column', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `category_id`, `featured`, `deleted_at`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'FRIST THE IMPORTANT & STANDARD POST FORMAT', 'FRIST-THE-IMPORTANT-&-STANDARD-POST-FORMAT', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh\r\n                                euismod tincidunt ut laoreet dolore.', 7, 'uploads/posts/16358286286.jpg', NULL, '2021-10-30 14:58:30', '2021-11-02 11:50:28', 1),
(3, 'THE Second post IMPORTANT & STANDARD POST FORMAT', 'THE-Second-post-IMPORTANT-&-STANDARD-POST-FORMAT', 'THE IMPORTANT & STANDARD POST FORMAT', 2, 'uploads/posts/16355849623.jpg', NULL, '2021-10-30 16:09:22', '2021-10-30 16:09:22', 2),
(4, 'QUOD MAZIM PLACERAT FACER POSSIM ASSUM', 'QUOD-MAZIM-PLACERAT-FACER-POSSIM-ASSUM', 'THE IMPORTANT & STANDARD POST FORMAT', 6, 'uploads/posts/16355997416.jpg', NULL, '2021-10-30 16:09:48', '2021-10-30 20:15:41', 1),
(5, 'THE  four post IMPORTANT & STANDARD POST FORMAT', 'THE-four-post-IMPORTANT-&-STANDARD-POST-FORMAT', 'THE THRID POST IMPORTANT & STANDARD POST FORMAT', 5, 'uploads/posts/16355861713.jpg', NULL, '2021-10-30 16:20:57', '2021-10-30 16:29:31', 3),
(6, 'THE Five POST IMPORTANT & STANDARD POST FORMAT', 'THE-Five-POST-IMPORTANT-&-STANDARD-POST-FORMAT', 'THE THRID POST IMPORTANT & STANDARD POST FORMAT', 2, 'uploads/posts/16355876555.jpg', NULL, '2021-10-30 16:54:15', '2021-10-30 16:54:15', 1),
(7, 'THE six POST IMPORTANT & STANDARD POST FORMAT', 'THE-six-POST-IMPORTANT-&-STANDARD-POST-FORMAT', 'THE THRID POST IMPORTANT & STANDARD POST FORMAT', 2, 'uploads/posts/16355999721.png', NULL, '2021-10-30 16:54:33', '2021-10-30 20:19:32', 2),
(8, 'INVESTIGATIONES DEMONSTRAVERUNT LEGERE', 'INVESTIGATIONES-DEMONSTRAVERUNT-LEGERE', 'INVESTIGATIONES DEMONSTRAVERUNT LEGERE', 7, 'uploads/posts/16355995934.jpg', NULL, '2021-10-30 19:55:31', '2021-10-30 20:13:13', 1),
(9, 'QUOD MAZIM PLACERAT FACER POSSIM ASSUM', 'QUOD-MAZIM-PLACERAT-FACER-POSSIM-ASSUM', 'QUOD MAZIM PLACERAT FACER POSSIM ASSUM', 7, 'uploads/posts/16355996232.png', NULL, '2021-10-30 19:55:59', '2021-10-30 20:13:43', 1),
(10, 'CLARITAS EST ETIAM PROCESSUS DYNAMICUS', 'CLARITAS-EST-ETIAM-PROCESSUS-DYNAMICUS', 'CLARITAS EST ETIAM PROCESSUS DYNAMICUS', 6, 'uploads/posts/16356015862.png', NULL, '2021-10-30 20:46:26', '2021-10-30 20:46:26', 3),
(11, 'INVESTIGATIONES DEMONSTRAVERUNT LEGERE', 'INVESTIGATIONES-DEMONSTRAVERUNT-LEGERE', 'INVESTIGATIONES DEMONSTRAVERUNT LEGERE', 6, 'uploads/posts/16359205995.jpg', NULL, '2021-10-30 20:47:06', '2021-11-03 13:23:19', 1),
(13, 'FRIST CODE BLOCK THE IMPORTANT & STANDARD POST FORMAT', 'FRIST-CODE-BLOCK-THE-IMPORTANT-&-STANDARD-POST-FORMAT', 'Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.', 2, 'uploads/posts/16392766301.png', NULL, '2021-11-03 13:27:36', '2021-12-12 10:37:10', 2),
(15, 'kamurl', 'kamurl', 'sadfsa', 2, 'uploads/posts/1641866930Screenshot_3.png', '2022-01-11 10:09:46', '2022-01-11 10:08:50', '2022-01-11 10:09:46', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posts_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `posts_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 4, 2, NULL, NULL),
(6, 5, 1, NULL, NULL),
(7, 6, 1, NULL, NULL),
(8, 6, 2, NULL, NULL),
(9, 7, 1, NULL, NULL),
(10, 7, 2, NULL, NULL),
(11, 8, 1, NULL, NULL),
(12, 8, 2, NULL, NULL),
(13, 9, 1, NULL, NULL),
(14, 10, 1, NULL, NULL),
(15, 10, 2, NULL, NULL),
(16, 11, 1, NULL, NULL),
(17, 11, 2, NULL, NULL),
(18, 12, 1, NULL, NULL),
(19, 12, 2, NULL, NULL),
(20, 12, 3, NULL, NULL),
(26, 13, 7, NULL, NULL),
(27, 13, 4, NULL, NULL),
(28, 13, 5, NULL, NULL),
(29, 13, 6, NULL, NULL),
(30, 14, 3, NULL, NULL),
(31, 14, 4, NULL, NULL),
(32, 15, 5, NULL, NULL),
(33, 15, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `avater`, `user_id`, `about`, `facebook`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'uploads/profile/profile.jpg', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?', 'https://www.facebook.com/', 'https://www.youtube.com/', '2021-10-25 16:18:18', '2021-10-25 16:18:18'),
(2, 'uploads/profile/profile.jpg', 2, NULL, NULL, NULL, '2021-10-25 16:19:27', '2021-10-25 16:19:27'),
(3, 'uploads/profile/profile.jpg', 3, NULL, NULL, NULL, '2022-01-11 10:06:17', '2022-01-11 10:06:17'),
(4, 'uploads/profile/profile.jpg', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?', 'https://www.facebook.com/', 'https://www.youtube.com/', '2022-01-11 10:18:32', '2022-01-11 10:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8L6BMB08ndEnTeYufBXAAE56NlxyBdO9wTolesYJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQURVa2t0VGNpUDBZMmloS05SZTZnMGp0elo1TzZzSWNxcWZMRjdJeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXR0aW5ncy9hbGxfc2V0dGluZ3MiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkV01zQ3ZsTzZrSm1qRWxLZS9KbVpRZVR3RUFWUkxYLk1iNmJicHM3ZWJDZHVmY2VsODgvUnEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFdNc0N2bE82a0ptakVsS2UvSm1aUWVUd0VBVlJMWC5NYjZiYnBzN2ViQ2R1ZmNlbDg4L1JxIjt9', 1641956566),
('oHUjeU9l6eG91rIKmCp2Tlh5z2wFrg32Zu314dev', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoib1FFUHg2djdsYjhtZjluUkZ1YWV6TFFEMVUxZzh3VTkzRmN5aDFkUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YWcvNyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkV01zQ3ZsTzZrSm1qRWxLZS9KbVpRZVR3RUFWUkxYLk1iNmJicHM3ZWJDZHVmY2VsODgvUnEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFdNc0N2bE82a0ptakVsS2UvSm1aUWVUd0VBVlJMWC5NYjZiYnBzN2ViQ2R1ZmNlbDg4L1JxIjt9', 1642383061),
('sXWt8FFzy02g5wzGTyIFgIDBejGtL3Pw2xlTIaV2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXY0MTZnV0VibE03ZmRIeVNCRzNIZkwzYmNVeEZZckZpMVE3Z0tqeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0cy9GUklTVC1DT0RFLUJMT0NLLVRIRS1JTVBPUlRBTlQtJi1TVEFOREFSRC1QT1NULUZPUk1BVCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1641963739);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `contact_number`, `contact_email`, `address`, `created_at`, `updated_at`, `content`, `title`) VALUES
(1, 'Laravel Blog', '01756210215', 'info@seosight.com', 'Melbourne, Australia', '2021-10-25 16:18:18', '2022-01-17 09:27:19', 'Seosight Company , Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius parum claram.', 'Seosight Company');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food', '2021-10-25 16:19:06', '2021-10-25 16:19:06'),
(2, 'Resturent', '2021-10-30 14:54:36', '2021-10-30 14:54:36'),
(3, 'Business', '2021-11-01 13:47:10', '2021-11-01 13:47:10'),
(4, 'Seo', '2021-11-01 13:47:15', '2021-11-01 13:47:15'),
(5, 'Keyword', '2021-11-07 14:01:58', '2021-11-07 14:01:58'),
(6, 'Audience', '2021-11-07 14:02:05', '2021-11-07 14:02:05'),
(7, 'Strategy', '2021-11-07 14:02:12', '2021-11-07 14:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'suzon', 'suzon@gmail.com', 1, NULL, '$2y$10$WMsCvlO6kJmjElKe/JmZQeTwEAVRLX.Mb6bbps7ebCdufcel88/Rq', NULL, NULL, NULL, NULL, NULL, '2021-10-25 16:18:18', '2022-01-12 06:58:52'),
(2, 'Zahidul Islam', 'zahid@gmail.com', 0, NULL, '$2y$10$wzQ43jKkshS2eaY4CkgZwu9mXXaFoKvzWGmL01qcAVZNDY9FXmd/u', NULL, NULL, NULL, NULL, NULL, '2021-10-25 16:19:27', '2021-10-25 16:19:27'),
(3, 'Kamrul Islam', 'kamrul@gmail.com', 1, NULL, '$2y$10$WfPVQhOzMvj65w1Z8Qr4CuNoPbdWV6hy4wwU0VzWg/lKTCOmhJvRe', NULL, NULL, NULL, NULL, NULL, '2022-01-11 10:06:17', '2022-01-11 10:06:17'),
(4, 'ratul', 'ratul@gmail.com', 0, NULL, '$2y$10$Gv7Z0N1CB7sC5ceL3V3iEuUhE93NE98RBaBaneoRFj6Qqd/XNsSKW', NULL, NULL, NULL, NULL, NULL, '2022-01-11 10:18:32', '2022-01-11 10:18:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
