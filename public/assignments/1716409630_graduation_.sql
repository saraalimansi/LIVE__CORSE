-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 مايو 2024 الساعة 00:29
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduation_`
--

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_05_03_225617_create_teachers_table', 1),
(5, '2024_05_03_225631_create_students_table', 1),
(6, '2024_05_04_003519_create_users_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', 'ce7b03635ba99fbedaeabe1fe5ec8d8b2df374f4baec1049ee53a2f870eebc85', '[\"*\"]', NULL, NULL, '2024-05-03 22:42:26', '2024-05-03 22:42:26'),
(2, 'App\\Models\\User', 1, 'authToken', '1c5d8332d98b13aa5085765019c60427789eeee29aadac771230badbe1232028', '[\"*\"]', NULL, NULL, '2024-05-03 22:43:52', '2024-05-03 22:43:52'),
(3, 'App\\Models\\User', 1, 'authToken', '146108c7a6c9f92cf82c3e6b4185e6690e466f7030a05aeae917ae0697b7d746', '[\"*\"]', NULL, NULL, '2024-05-03 22:45:38', '2024-05-03 22:45:38'),
(4, 'App\\Models\\User', 1, 'authToken', 'e1859257107618abbb036ff89d82f1d693181aec7f9b479ec20f0f83d69f14ab', '[\"*\"]', NULL, NULL, '2024-05-03 22:47:21', '2024-05-03 22:47:21'),
(5, 'App\\Models\\User', 8, 'authToken', '98f833073d21b16a813324507596ccf14a17c057eb0db1cdcbcbc5160717c1cd', '[\"*\"]', NULL, NULL, '2024-05-04 15:55:25', '2024-05-04 15:55:25'),
(6, 'App\\Models\\User', 17, 'authToken', '3df75057cf5c155f3c3aee8e9ee7fd65bdc7c08c4bb215dd50f1c453f3ae0417', '[\"*\"]', NULL, NULL, '2024-05-04 16:27:58', '2024-05-04 16:27:58'),
(7, 'App\\Models\\User', 18, 'authToken', 'f349a884fca7c0989a5fdf673bf1ca2b9158e8c036e91dee0969f4cc0c4e380a', '[\"*\"]', '2024-05-04 16:35:40', NULL, '2024-05-04 16:34:54', '2024-05-04 16:35:40'),
(8, 'App\\Models\\User', 18, 'authToken', '6d4c5ff19611bd56e62ba9c509565e58ceddb36f1cb922e35f43a0986844a123', '[\"*\"]', NULL, NULL, '2024-05-04 16:39:00', '2024-05-04 16:39:00');

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `teacher_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yaser', 'ali', 'yaser@gmail.com', NULL, '$2y$10$ufREOfD8GINj3OtMy434Ze074fdOWUVTOdbIWUkN4YmEpTdPFPQp6', 11123, NULL, NULL, '2024-05-04 15:48:06', '2024-05-04 15:48:06'),
(2, 'nn', 'ali', 'nn@gmail.com', NULL, '$2y$10$WwnYREc8RiI5epwZL0YFue4RItNqWeJDe5ZXnHAmukBPgO0GpOk1u', 11123, NULL, NULL, '2024-05-04 15:50:18', '2024-05-04 15:50:18'),
(3, 'nn', 'ali', 'nns@gmail.com', NULL, '$2y$10$hg0Lla8BtdmIMDEfeB25J.0Ktb0OqYh6fbRHtFUiOh1cj.cHBTj..', 11123, NULL, NULL, '2024-05-04 15:52:02', '2024-05-04 15:52:02'),
(4, 'nn', 'ali', 'nnبs@gmail.com', NULL, '$2y$10$tx3ZzXB0Yzh05/ofxvBOXuDu4bbALz338HcOP30lKvHmQZpDBVWUm', 11123, NULL, NULL, '2024-05-04 16:04:31', '2024-05-04 16:04:31'),
(5, 'nn', 'ali', 'قق@gmail.com', NULL, '$2y$10$bvO6r6OcWmfzEGVxtGnuAuXS7R.mlHRCqwdRIo03DtzYFljPqykQi', 11123, NULL, NULL, '2024-05-04 16:14:12', '2024-05-04 16:14:12'),
(6, 'nn', 'ali', 'قق@gmail.coق', NULL, '$2y$10$kL0FvIvTd/0R.sA7C.Xwq.cYm0kGWEGniHZS3P25J7j9OYWg1ldkm', 11123, NULL, NULL, '2024-05-04 16:14:43', '2024-05-04 16:14:43'),
(7, 'nn', 'ali', 'بب@gmail.com', NULL, '$2y$10$4Pw0sNkyoE8xaA9z5OBELuC1/eB61OHm1CiVytWrjFE.VFT2iNzMy', 11123, NULL, NULL, '2024-05-04 16:16:06', '2024-05-04 16:16:06'),
(8, 'nn', 'ali', 'ببب@gmail.com', NULL, '$2y$10$2UN6iW5dQ0koFTYw8v5QRO/e0jaB/1vN.cWkcEwgqgrFlNeW5DzFC', 11123, NULL, NULL, '2024-05-04 16:16:33', '2024-05-04 16:16:33'),
(9, 'nn', 'ali', 'بdبب@gmail.com', NULL, '$2y$10$7vWWiYhQWrUuoGkxigSMZ.a/uCEWYISAIiZNwpcEZMy37Xr5xMF.6', 11123, NULL, NULL, '2024-05-04 16:18:13', '2024-05-04 16:18:13'),
(10, 'nn', 'ali', 'بdيبب@gmail.com', NULL, '$2y$10$gJOovKMzYP062xGD7vCZyO1pCGI9VuD9qBWMc8cTxAuTGBs4S/cCu', 11123, NULL, NULL, '2024-05-04 16:21:57', '2024-05-04 16:21:57'),
(11, 'nn', 'ali', 'يي@gmail.com', NULL, '$2y$10$1Puzyz03e0uYAz4xqhTwveLIvNgUfJ97OEI64BfS65bDKV8gHjiRC', 11123, NULL, NULL, '2024-05-04 16:22:39', '2024-05-04 16:22:39'),
(12, 'nn', 'ali', 'fff@gmail.com', NULL, '$2y$10$WFtX3Lvhf72GIFtH1Db0dOsxlN4smV9nEfTusCt8FlOZCj7ClnbH2', 11123, NULL, NULL, '2024-05-04 16:36:16', '2024-05-04 16:36:16'),
(13, 'nn', 'ali', 'ffff@gmail.com', NULL, '$2y$10$t7mP5bf63ZbOj4IFDnzfsusfVEZp5kiztt/rJkLkqSxmVcKMleL1K', 11123, NULL, NULL, '2024-05-04 16:38:47', '2024-05-04 16:38:47');

-- --------------------------------------------------------

--
-- بنية الجدول `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `photos` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `subject`, `photos`, `code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'd', 'ali', 'd@gmail.com', NULL, '$2y$10$8DggI/6WrrDJb0XTTuC4IuHjgXUm3413wYbw4.idtwnRg5oZi3x3i', 11123, 'sss', 'public/teacher/MOj5LSjiGmS2Hac3KbrCC56b3AwxSkZ6baJdWhsv.jpg', NULL, NULL, '2024-05-03 22:40:03', '2024-05-03 22:40:03'),
(2, 'sarah', 'ali', 'sarah@gmail.com', NULL, '$2y$10$W.vquMB9v4C1ZQkZTaPiQOUVbF1J17d8pxSsxAfxDA7wv/dDPMpK2', 11123, 'sss', 'public/teacher/CvOi0K6WZsKbFL9HJJ1HWb0fzYDfIGErvnw5xRKQ.jpg', 'Ltr7kN', NULL, '2024-05-04 15:39:46', '2024-05-04 15:39:46'),
(3, 'ahmed', 'ali', 'ahmed@gmail.com', NULL, '$2y$10$J0RGfNxfxNrsPq/5p3DB7.noVn4DWYqADXjVsFesTtNWU1F2uzCHy', 11123, 'sss', 'public/teacher/Ka762A4U4H9Ur9obHzv6mbUOzHRiJbNAdlzhB4Mt.jpg', 'z7ULSQ', NULL, '2024-05-04 15:40:13', '2024-05-04 15:40:13'),
(4, 'hager', 'ali', 'hager@gmail.com', NULL, '$2y$10$67GZupXLVZMwq38ci74eluv5v8hJP6dZvm/tpmet4PobATwGk0FbS', 11123, 'sss', 'public/teacher/it4oDUaU4l2oXvvWTWSTJZIT7fdAGQOKB3cgToKX.jpg', 'IDb2cJ', NULL, '2024-05-04 15:43:33', '2024-05-04 15:43:33'),
(5, 'fatema', 'ali', 'fatema@gmail.com', NULL, '$2y$10$wx16PX4vOm/JFadRClaOl..sz2EJn7DJRtpdJXEeZSy4X.w951pBS', 11123, 'sss', 'public/teacher/on9cHkeL41L2vse1q7VkRAvoxcgNc3wXYGCXuKSw.jpg', 'nsqAzG', NULL, '2024-05-04 15:45:31', '2024-05-04 15:45:31'),
(6, 'nn', 'ali', 'يdي@gmail.com', NULL, '$2y$10$Dfra3D8QyhEhn9X4nVUn/OTeBfqfocUNaa3ZUxY7KN5e3CrOHvlmy', 11123, 'sss', 'public/teacher/l3TlxiPgAs1A34y8wvSC4fe5ymPfHkQD760xMg1T.jpg', 'm0IgFK', NULL, '2024-05-04 16:23:45', '2024-05-04 16:23:45'),
(7, 'nn', 'ali', 'ff@gmail.com', NULL, '$2y$10$bjtwWCQbLLaAMxydN2J/IuhJ7qe5EUrr9D23Na4uHcMfH.SNLAvnO', 11123, 'sss', 'public/teacher/6T6tW20Gx8TFlBaH3z2QGjV6BomwnNz39e4DzXlR.jpg', 'XiPVQN', NULL, '2024-05-04 16:34:09', '2024-05-04 16:34:09');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `photos` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `role` enum('student','teacher') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `subject`, `photos`, `code`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'd', 'ali', 'd@gmail.com', NULL, '$2y$10$8ztysw6tCYvIwgHncLDgmO6FdpaNQjCoFZITRkpKO7enbmB8nh0d.', 11123, 'sss', 'public/teacher/MOj5LSjiGmS2Hac3KbrCC56b3AwxSkZ6baJdWhsv.jpg', NULL, 'student', NULL, '2024-05-03 22:40:02', '2024-05-03 22:40:02'),
(2, 'sarah', 'ali', 'sarah@gmail.com', NULL, '$2y$10$DDq3lr07ac/oNTtHKZSZFuJy51sXc8f9BrDpBLSANQSDD98y7JL36', 11123, 'sss', 'public/teacher/CvOi0K6WZsKbFL9HJJ1HWb0fzYDfIGErvnw5xRKQ.jpg', 'Ltr7kN', 'student', NULL, '2024-05-04 15:39:46', '2024-05-04 15:39:46'),
(3, 'ahmed', 'ali', 'ahmed@gmail.com', NULL, '$2y$10$Lz6WHZ5RejxDL6cLrIw/5.6v9BP/LvmJ5wgwHPH/vbLQAhkGWKJcS', 11123, 'sss', 'public/teacher/Ka762A4U4H9Ur9obHzv6mbUOzHRiJbNAdlzhB4Mt.jpg', 'z7ULSQ', 'student', NULL, '2024-05-04 15:40:13', '2024-05-04 15:40:13'),
(4, 'hager', 'ali', 'hager@gmail.com', NULL, '$2y$10$wiWdkoNUv9BYB6MGtZsApuRu9KMq2hWaGHCOH3ToENHcroYsHjWMa', 11123, 'sss', 'public/teacher/it4oDUaU4l2oXvvWTWSTJZIT7fdAGQOKB3cgToKX.jpg', 'IDb2cJ', 'student', NULL, '2024-05-04 15:43:33', '2024-05-04 15:43:33'),
(5, 'fatema', 'ali', 'fatema@gmail.com', NULL, '$2y$10$IrDwFUqiceTxNEoIDzeIPeaXptvps0nX.8TZ6Pm1Z46Os8byuXZAi', 11123, 'sss', 'public/teacher/on9cHkeL41L2vse1q7VkRAvoxcgNc3wXYGCXuKSw.jpg', 'nsqAzG', 'student', NULL, '2024-05-04 15:45:31', '2024-05-04 15:45:31'),
(6, 'yaser', 'ali', 'yaser@gmail.com', NULL, '$2y$10$yKKemx.cJez8zVA5yh8WkuxhgZ8vNFBOUGsOZxZMSfEcwziUeI3km', 11123, 'sss', 'public/teacher/zVhpxXvSVt3To3eXxeryditcSJaHkyPMGPyK0cm3.jpg', NULL, 'student', NULL, '2024-05-04 15:48:06', '2024-05-04 15:48:06'),
(7, 'nn', 'ali', 'nn@gmail.com', NULL, '$2y$10$uakDIGRGOWVKFyqajrY.o.S5aKxIUZefH3INZcRqQ28t/I0TF/qZ.', 11123, 'sss', 'public/teacher/AkgUwf5Fe2VVhbCDuDzKunElwr2FNBIQ38YVl2Za.jpg', NULL, 'student', NULL, '2024-05-04 15:50:17', '2024-05-04 15:50:17'),
(8, 'nn', 'ali', 'nns@gmail.com', NULL, '$2y$10$TWMuAKgwurk0i1oC2WlM4OjWSvZ.vSsHgTvsVOO7S5f2m/QriQ1Je', 11123, 'sss', 'public/teacher/o4XClvki2RLjHBOSu8pjdImC7P76m9V1Gah3FtFJ.jpg', NULL, 'student', NULL, '2024-05-04 15:52:02', '2024-05-04 15:52:02'),
(9, 'nn', 'ali', 'nnبs@gmail.com', NULL, '$2y$10$oPi989JTJcLEj3fvnMm/LOcpx0f6KBOwTlgBFprysQKyfNlt11.e6', 11123, 'sss', 'public/teacher/fYrVLXp7Yjp6K4y7Lm5DeSB2D7TdpelXP4ITurEi.jpg', NULL, 'student', NULL, '2024-05-04 16:04:31', '2024-05-04 16:04:31'),
(10, 'nn', 'ali', 'قق@gmail.com', NULL, '$2y$10$az.BeeoTorlaxheYC/LeE.MRAPcKTevxweAJ8kDuLjxXLUmKJ8KzO', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:14:11', '2024-05-04 16:14:11'),
(11, 'nn', 'ali', 'قق@gmail.coق', NULL, '$2y$10$6l.1R8Ro6z4VsMtMJoCuO.iRTLVNgHQJ19Lk.kbSmBbypIdIMWpU.', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:14:43', '2024-05-04 16:14:43'),
(12, 'nn', 'ali', 'بب@gmail.com', NULL, '$2y$10$X24eH7qtufTJdc56Lisz/ulV2ZQaWn/EUqE8kS.lhLdHOnioCp2oS', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:16:06', '2024-05-04 16:16:06'),
(13, 'nn', 'ali', 'ببب@gmail.com', NULL, '$2y$10$Cf1PB40bs/09Qqrxhw3CEe90LaYmTdHUQfWTJvKRxkdWYmvpzKy8O', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:16:33', '2024-05-04 16:16:33'),
(14, 'nn', 'ali', 'بdبب@gmail.com', NULL, '$2y$10$1BY6WvaEQ.WjipenkHsxo.uv6wern/uCiZ/UUQ2Z4PxeaorKGAGZ2', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:18:13', '2024-05-04 16:18:13'),
(15, 'nn', 'ali', 'بdيبب@gmail.com', NULL, '$2y$10$.uLErC3Y7.Tmp.liOOtVWeG4tcvIs84.gsptpErohhT2SBDgs2NBO', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:21:56', '2024-05-04 16:21:56'),
(16, 'nn', 'ali', 'يي@gmail.com', NULL, '$2y$10$hvXbJlTDX0CbuueffNmhRexphfLFpdaOxy75f6j8zov/.KfYRUjIG', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:22:39', '2024-05-04 16:22:39'),
(17, 'nn', 'ali', 'يdي@gmail.com', NULL, '$2y$10$R.6q2EnkpCz6aPsXNLZ/EuOyWrShTGt.8WV/4Q850c/pvhDuB7tsO', 11123, 'sss', 'public/teacher/l3TlxiPgAs1A34y8wvSC4fe5ymPfHkQD760xMg1T.jpg', 'm0IgFK', 'student', NULL, '2024-05-04 16:23:45', '2024-05-04 16:23:45'),
(18, 'nn', 'ali', 'ff@gmail.com', NULL, '$2y$10$ruVoFbD3/9//b5HZHS/EteFSujKZVCDQvx.MMPTHLlaGV2CWGBbqe', 11123, 'sss', 'public/teacher/6T6tW20Gx8TFlBaH3z2QGjV6BomwnNz39e4DzXlR.jpg', 'XiPVQN', 'teacher', NULL, '2024-05-04 16:34:09', '2024-05-04 16:34:09'),
(19, 'nn', 'ali', 'fff@gmail.com', NULL, '$2y$10$AZoxE0Ju1.XBU.xas8mIcuCIvIgig007x.wKHw4ARjm6ZFZN24rDu', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:36:15', '2024-05-04 16:36:15'),
(20, 'nn', 'ali', 'ffff@gmail.com', NULL, '$2y$10$XwIxzEIYBQehuPnenGPJ2O0fxod9TZRkoHkt.mEVbjnoekaJvVPAK', 11123, NULL, NULL, NULL, 'student', NULL, '2024-05-04 16:38:47', '2024-05-04 16:38:47');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_code_unique` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
