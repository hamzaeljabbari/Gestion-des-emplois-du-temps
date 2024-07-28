-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 02:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `annee_universitaires`
--

CREATE TABLE `annee_universitaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `annee` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `departement`, `created_at`, `updated_at`) VALUES
(1, 'Department 1', '2023-05-08 19:29:45', '2023-05-08 19:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `enseignants`
--

CREATE TABLE `enseignants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialite_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enseignants`
--

INSERT INTO `enseignants` (`id`, `nom`, `prenom`, `email`, `tel`, `specialite_id`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed', 'Ameziane', 'mohamed@gmail.com', '0614253641', 1, '2023-05-08 19:30:56', '2023-05-08 19:30:56'),
(2, 'Youness', 'Idrissi', 'youness@gmail.com', '0104072052', 2, '2023-05-08 19:31:15', '2023-05-08 19:31:15'),
(3, 'Khaled', 'Ouazzani', 'khaled@gmail.com', '0501041025', 1, '2023-05-14 14:42:40', '2023-05-14 14:42:40');

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
-- Table structure for table `filieres`
--

CREATE TABLE `filieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enseignant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`id`, `filiere`, `enseignant_id`, `created_at`, `updated_at`) VALUES
(1, 'Médecine', 1, '2023-05-08 19:33:18', '2023-05-08 19:33:18'),
(2, 'Pharmacy', 2, '2023-05-08 19:33:29', '2023-05-08 19:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `langues`
--

CREATE TABLE `langues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langues`
--

INSERT INTO `langues` (`id`, `langue`, `created_at`, `updated_at`) VALUES
(1, 'Français', '2023-05-08 20:41:37', '2023-05-08 20:41:37'),
(2, 'English', '2023-05-08 20:41:37', '2023-05-08 20:41:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_10_112551_create_departements_table', 1),
(6, '2023_04_10_112619_create_specialites_table', 1),
(7, '2023_04_10_112635_create_salles_table', 1),
(8, '2023_04_10_112647_create_enseignants_table', 1),
(9, '2023_04_10_112648_create_filieres_table', 1),
(10, '2023_04_10_112649_create_langues_table', 1),
(11, '2023_04_10_112650_create_niveaux_table', 1),
(12, '2023_04_10_112716_create_semestres_table', 1),
(13, '2023_04_10_112741_create_groupes_table', 1),
(14, '2023_04_10_112751_create_sub_groupes_table', 1),
(15, '2023_04_10_112811_create_modules_table', 1),
(16, '2023_04_10_112824_create_sub_modules_table', 1),
(18, '2023_04_10_113007_create_groupe_modules_table', 1),
(19, '2023_04_10_113021_create_annee_universitaires_table', 1),
(21, '2023_04_10_113042_create_type_seances_table', 1),
(22, '2023_04_10_113026_create_seances_table', 2),
(24, '2023_04_10_112912_create_module_enseignants_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_horaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enseignant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module`, `type_module`, `v_horaire`, `enseignant_id`, `created_at`, `updated_at`) VALUES
(1, 'STRUCTURE AND FUNCTION (HB-2)', 'cours_theorique', '20', 1, '2023-05-08 19:34:14', '2023-05-08 19:34:14'),
(2, 'HEALTH AND DISEASE (HB-3)', 'travaux_diriges', '50', 2, '2023-05-08 19:34:30', '2023-05-08 19:34:30'),
(3, 'PSYCHOSOCIAL ISSUES IN HEALTHCARE (C-1)', 'travaux_pratique', '50', 2, '2023-05-08 19:34:45', '2023-05-08 19:34:45'),
(4, 'HEMATOLOGY AND ONCOLOGY (S-1)', 'cours_theorique', '60', 1, '2023-05-08 19:35:00', '2023-05-08 19:35:00'),
(5, 'FOCUSED INQUIRY AND RESEARCH EXPERIENCE 1 (F.I.R.E.) (I-1)', 'cours_theorique', '70', 1, '2023-05-08 19:35:13', '2023-05-14 14:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `module_enseignants`
--

CREATE TABLE `module_enseignants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateSeance` date NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `enseignant_id` bigint(20) UNSIGNED NOT NULL,
  `seance_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_enseignants`
--

INSERT INTO `module_enseignants` (`id`, `dateSeance`, `module_id`, `enseignant_id`, `seance_id`, `created_at`, `updated_at`) VALUES
(7, '2023-05-08', 1, 1, 43, '2023-05-10 14:20:17', '2023-05-10 14:20:17'),
(8, '2023-05-10', 3, 1, 45, '2023-05-10 14:20:59', '2023-05-10 14:20:59'),
(10, '2023-05-09', 1, 2, 49, '2023-05-10 14:36:45', '2023-05-10 14:36:45'),
(11, '2023-05-11', 2, 1, 50, '2023-05-12 23:39:48', '2023-05-12 23:39:48'),
(39, '2023-05-12', 2, 1, 82, '2023-05-13 11:43:32', '2023-05-13 11:43:32'),
(42, '2023-05-13', 2, 1, 85, '2023-05-13 11:45:49', '2023-05-13 11:45:49'),
(44, '2023-05-08', 2, 1, 87, '2023-05-13 11:46:52', '2023-05-13 11:46:52'),
(48, '2023-05-09', 5, 2, 91, '2023-05-14 13:20:27', '2023-05-14 13:20:27'),
(49, '2023-05-10', 4, 1, 92, '2023-05-14 13:24:49', '2023-05-14 13:24:49'),
(50, '2023-05-17', 4, 1, 93, '2023-05-14 13:24:49', '2023-05-14 13:24:49'),
(51, '2023-05-15', 1, 1, 94, '2023-05-16 23:59:44', '2023-05-16 23:59:44'),
(52, '2023-05-16', 2, 1, 95, '2023-05-17 00:00:04', '2023-05-17 00:00:04'),
(53, '2023-05-18', 2, 1, 96, '2023-05-17 00:00:20', '2023-05-17 00:00:20'),
(54, '2023-05-19', 4, 1, 97, '2023-05-17 00:00:37', '2023-05-17 00:00:37'),
(55, '2023-05-20', 2, 1, 98, '2023-05-17 00:00:53', '2023-05-17 00:00:53'),
(56, '2023-05-27', 2, 1, 99, '2023-05-17 00:00:53', '2023-05-17 00:00:53'),
(57, '2023-06-03', 2, 1, 100, '2023-05-17 00:00:54', '2023-05-17 00:00:54'),
(58, '2023-06-10', 2, 1, 101, '2023-05-17 00:00:54', '2023-05-17 00:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filiere_id` bigint(20) UNSIGNED NOT NULL,
  `langue_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`id`, `niveau`, `filiere_id`, `langue_id`, `created_at`, `updated_at`) VALUES
(1, 'Niveau 1', 1, 1, '2023-05-08 20:42:22', '2023-05-08 20:42:22'),
(2, 'Niveau 2', 1, 2, '2023-05-08 20:42:22', '2023-05-08 20:42:22'),
(3, 'Niveau 3', 1, 1, '2023-05-08 20:42:22', '2023-05-08 20:43:22'),
(4, 'Niveau 4', 1, 2, '2023-05-08 20:42:22', '2023-05-08 20:43:22'),
(5, 'Niveau 5', 1, 1, '2023-05-08 20:43:50', '2023-05-08 20:43:50'),
(6, 'Niveau 6', 2, 2, '2023-05-08 20:44:18', '2023-05-08 20:44:18'),
(7, 'Niveau 7', 2, 1, '2023-05-08 20:44:18', '2023-05-08 20:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_salle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salleEtat` int(11) NOT NULL DEFAULT 0 COMMENT '0 salle vide 1 salle not vide',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id`, `salle`, `type_salle`, `salleEtat`, `created_at`, `updated_at`) VALUES
(1, 'Salle 1', 'Salle de cours', 0, '2023-05-08 19:31:39', '2023-05-08 19:31:39'),
(2, 'Salle 2', 'Salle de cours', 1, '2023-05-08 19:31:48', '2023-05-08 19:31:48'),
(3, 'Salle 3', 'Salle de cours', 0, '2023-05-08 19:31:57', '2023-05-08 19:31:57'),
(4, 'Salle 4', 'Salle de cours', 0, '2023-05-08 19:32:04', '2023-05-08 19:32:04'),
(5, 'Salle 5', 'Salle de cours', 0, '2023-05-08 19:32:10', '2023-05-08 19:32:10'),
(6, 'Salle 6', 'Salle de pratique', 0, '2023-05-08 19:32:48', '2023-05-08 19:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `seances`
--

CREATE TABLE `seances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateSeance` date NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `groupe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_seance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_module` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motifAbsence` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_start` int(11) DEFAULT NULL,
  `h_end` int(11) DEFAULT NULL,
  `etatSeance` int(11) DEFAULT 0 COMMENT '0 seance success 1 seance cancel',
  `enseignant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `salle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `annee_universitaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `niveau_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filiere_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semestre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `langue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seances`
--

INSERT INTO `seances` (`id`, `dateSeance`, `start`, `end`, `groupe`, `type_seance`, `theme_module`, `motifAbsence`, `h_start`, `h_end`, `etatSeance`, `enseignant_id`, `module_id`, `salle_id`, `annee_universitaire_id`, `niveau_id`, `filiere_id`, `semestre_id`, `langue_id`, `created_at`, `updated_at`) VALUES
(43, '2023-05-08', '2023-05-08 08:30:00', '2023-05-08 10:30:00', 'A', 'Cours théorique', 'test', NULL, 8, 10, NULL, 1, 1, 1, NULL, 1, 1, 1, 1, '2023-05-10 14:20:17', '2023-05-10 14:20:17'),
(44, '2023-05-09', '2023-05-09 08:30:00', '2023-05-09 10:30:00', NULL, NULL, NULL, NULL, 8, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 14:20:34', '2023-05-10 14:20:34'),
(45, '2023-05-10', '2023-05-10 08:30:00', '2023-05-10 10:30:00', 'A', 'Travaux dirigés', 'test', NULL, 8, 10, NULL, 1, 3, 1, NULL, 1, 1, 1, 1, '2023-05-10 14:20:59', '2023-05-10 14:20:59'),
(46, '2023-05-11', '2023-05-11 08:30:00', '2023-05-11 10:30:00', NULL, NULL, NULL, NULL, 8, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 14:22:01', '2023-05-10 14:22:01'),
(47, '2023-05-12', '2023-05-12 08:30:00', '2023-05-12 11:00:00', NULL, NULL, NULL, NULL, 8, 11, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-10 14:22:08', '2023-05-10 14:22:08'),
(49, '2023-05-09', '2023-05-09 08:30:00', '2023-05-09 10:30:00', 'A', 'Cours théorique', 'test', NULL, 8, 10, NULL, 2, 1, 2, NULL, 1, 1, 1, 1, '2023-05-10 14:36:45', '2023-05-10 14:36:45'),
(50, '2023-05-11', '2023-05-11 08:30:00', '2023-05-11 10:30:00', 'A', 'Cours théorique', 'test', NULL, 8, 10, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-12 23:39:48', '2023-05-12 23:39:48'),
(61, '2023-05-15', '2023-05-15 08:30:00', '2023-05-15 10:30:00', NULL, NULL, NULL, NULL, 8, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-13 00:13:13', '2023-05-13 00:13:13'),
(62, '2023-05-16', '2023-05-16 08:30:00', '2023-05-16 11:00:00', NULL, NULL, NULL, NULL, 8, 11, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-13 00:13:21', '2023-05-13 00:13:21'),
(63, '2023-05-17', '2023-05-17 08:30:00', '2023-05-17 11:30:00', NULL, NULL, NULL, NULL, 8, 11, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-13 00:13:29', '2023-05-13 00:13:29'),
(64, '2023-05-20', '2023-05-20 08:30:00', '2023-05-20 10:00:00', NULL, NULL, NULL, NULL, 8, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-13 00:13:36', '2023-05-13 00:13:36'),
(82, '2023-05-12', '2023-05-12 08:30:00', '2023-05-12 10:30:00', 'A', 'Cours théorique', 'test', NULL, 8, 10, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-13 11:43:32', '2023-05-13 11:43:32'),
(85, '2023-05-13', '2023-05-13 08:30:00', '2023-05-13 10:30:00', 'A', 'Cours théorique', 'test', NULL, 8, 10, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-13 11:45:49', '2023-05-13 11:45:49'),
(87, '2023-05-08', '2023-05-08 14:30:00', '2023-05-08 16:30:00', 'A', 'Travaux dirigés', 'test', NULL, 14, 16, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-13 11:46:52', '2023-05-13 11:46:52'),
(91, '2023-05-09', '2023-05-09 14:30:00', '2023-05-09 16:30:00', 'A', 'Travaux dirigés', 'test', NULL, 14, 16, NULL, 2, 5, 1, NULL, 1, 1, 1, 1, '2023-05-14 13:20:27', '2023-05-14 13:20:27'),
(92, '2023-05-10', '2023-05-10 14:30:00', '2023-05-10 17:30:00', 'C', 'Travaux pratique', 'test etst test tt ts', NULL, 14, 17, NULL, 1, 4, 3, NULL, 1, 1, 1, 1, '2023-05-14 13:24:49', '2023-05-14 13:24:49'),
(93, '2023-05-17', '2023-05-17 14:30:00', '2023-05-17 17:30:00', 'C', 'Travaux pratique', 'test etst test tt ts', NULL, 14, 17, NULL, 1, 4, 3, NULL, 1, 1, 1, 1, '2023-05-14 13:24:49', '2023-05-14 13:24:49'),
(94, '2023-05-15', '2023-05-15 08:30:00', '2023-05-15 11:30:00', 'A', 'Travaux dirigés', 'test', NULL, 8, 11, NULL, 1, 1, 1, NULL, 1, 1, 1, 1, '2023-05-16 23:59:44', '2023-05-16 23:59:44'),
(95, '2023-05-16', '2023-05-16 08:30:00', '2023-05-16 10:30:00', 'A', 'Cours théorique', 'test', 'Error', 8, 10, 1, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-17 00:00:04', '2023-05-17 00:00:04'),
(96, '2023-05-18', '2023-05-18 14:30:00', '2023-05-18 16:30:00', 'A', 'Travaux dirigés', 'test', NULL, 14, 16, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-17 00:00:20', '2023-05-17 00:00:20'),
(97, '2023-05-19', '2023-05-19 08:30:00', '2023-05-19 11:30:00', 'A', 'Travaux pratique', 'hello test', NULL, 8, 11, NULL, 1, 4, 1, NULL, 1, 1, 1, 1, '2023-05-17 00:00:37', '2023-05-17 00:00:37'),
(98, '2023-05-20', '2023-05-20 08:30:00', '2023-05-20 12:30:00', 'A', 'Travaux dirigés', 'test', NULL, 8, 12, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-17 00:00:53', '2023-05-17 00:00:53'),
(99, '2023-05-27', '2023-05-27 08:30:00', '2023-05-27 12:30:00', 'A', 'Travaux dirigés', 'test', NULL, 8, 12, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-17 00:00:53', '2023-05-17 00:00:53'),
(100, '2023-06-03', '2023-06-03 08:30:00', '2023-06-03 12:30:00', 'A', 'Travaux dirigés', 'test', NULL, 8, 12, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-17 00:00:53', '2023-05-17 00:00:53'),
(101, '2023-06-10', '2023-06-10 08:30:00', '2023-06-10 12:30:00', 'A', 'Travaux dirigés', 'test', NULL, 8, 12, NULL, 1, 2, 1, NULL, 1, 1, 1, 1, '2023-05-17 00:00:54', '2023-05-17 00:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `semestres`
--

CREATE TABLE `semestres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semestre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semestres`
--

INSERT INTO `semestres` (`id`, `semestre`, `niveau_id`, `created_at`, `updated_at`) VALUES
(1, 'S-1', 1, NULL, NULL),
(2, 'S-2', 1, NULL, NULL),
(3, 'S-3', 2, NULL, NULL),
(4, 'S-4', 2, NULL, NULL),
(5, 'S-5', 3, NULL, NULL),
(6, 'S-6', 3, NULL, NULL),
(7, 'S-7', 4, NULL, NULL),
(8, 'S-8', 4, NULL, NULL),
(9, 'S-9', 5, NULL, NULL),
(10, 'S-10', 5, NULL, NULL),
(11, 'S-11', 6, NULL, NULL),
(12, 'S-12', 6, NULL, NULL),
(13, 'S-13', 7, NULL, NULL),
(14, 'S-14', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialites`
--

CREATE TABLE `specialites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialites`
--

INSERT INTO `specialites` (`id`, `specialite`, `departement_id`, `created_at`, `updated_at`) VALUES
(1, 'Médecine', 1, '2023-05-08 19:30:04', '2023-05-08 19:30:04'),
(2, 'Pharmacy', 1, '2023-05-08 19:30:20', '2023-05-08 19:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT 0 COMMENT '0 => admin, 1 => enseignant,2 => student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `address`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed Ameziane el hassani', 'admin@gmail.com', '0614253650', 'Fez Fez Bab maroc fes 10', NULL, '$2y$10$Yjs0WMemqm6tzVTlzxw.j.ksJDh2KeQs9rQLaJ2KrqETBSYycwgpq', 1, NULL, '2023-05-08 19:27:20', '2023-05-16 23:58:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annee_universitaires`
--
ALTER TABLE `annee_universitaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enseignants_specialite_id_foreign` (`specialite_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filieres_enseignant_id_foreign` (`enseignant_id`);


--
-- Indexes for table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_enseignant_id_foreign` (`enseignant_id`);

--
-- Indexes for table `module_enseignants`
--
ALTER TABLE `module_enseignants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_enseignants_module_id_foreign` (`module_id`),
  ADD KEY `module_enseignants_enseignant_id_foreign` (`enseignant_id`),
  ADD KEY `module_enseignants_seance_id_foreign` (`seance_id`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveaux_filiere_id_foreign` (`filiere_id`),
  ADD KEY `niveaux_langue_id_foreign` (`langue_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seances`
--
ALTER TABLE `seances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seances_enseignant_id_foreign` (`enseignant_id`),
  ADD KEY `seances_module_id_foreign` (`module_id`),
  ADD KEY `seances_salle_id_foreign` (`salle_id`),
  ADD KEY `seances_annee_universitaire_id_foreign` (`annee_universitaire_id`),
  ADD KEY `seances_niveau_id_foreign` (`niveau_id`),
  ADD KEY `seances_filiere_id_foreign` (`filiere_id`),
  ADD KEY `seances_semestre_id_foreign` (`semestre_id`),
  ADD KEY `langue_id` (`langue_id`);

--
-- Indexes for table `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semestres_niveau_id_foreign` (`niveau_id`);

--
-- Indexes for table `specialites`
--
ALTER TABLE `specialites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialites_departement_id_foreign` (`departement_id`);

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
-- AUTO_INCREMENT for table `annee_universitaires`
--
ALTER TABLE `annee_universitaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `module_enseignants`
--
ALTER TABLE `module_enseignants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seances`
--
ALTER TABLE `seances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `specialites`
--
ALTER TABLE `specialites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enseignants`
--
ALTER TABLE `enseignants`
  ADD CONSTRAINT `enseignants_specialite_id_foreign` FOREIGN KEY (`specialite_id`) REFERENCES `specialites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `filieres`
--
ALTER TABLE `filieres`
  ADD CONSTRAINT `filieres_enseignant_id_foreign` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_enseignant_id_foreign` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module_enseignants`
--
ALTER TABLE `module_enseignants`
  ADD CONSTRAINT `module_enseignants_enseignant_id_foreign` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_enseignants_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_enseignants_seance_id_foreign` FOREIGN KEY (`seance_id`) REFERENCES `seances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD CONSTRAINT `niveaux_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `niveaux_langue_id_foreign` FOREIGN KEY (`langue_id`) REFERENCES `langues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seances`
--
ALTER TABLE `seances`
  ADD CONSTRAINT `seances_annee_universitaire_id_foreign` FOREIGN KEY (`annee_universitaire_id`) REFERENCES `annee_universitaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seances_enseignant_id_foreign` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seances_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seances_langue_id_foreign` FOREIGN KEY (`langue_id`) REFERENCES `langues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seances_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seances_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seances_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seances_semestre_id_foreign` FOREIGN KEY (`semestre_id`) REFERENCES `semestres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semestres`
--
ALTER TABLE `semestres`
  ADD CONSTRAINT `semestres_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specialites`
--
ALTER TABLE `specialites`
  ADD CONSTRAINT `specialites_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
