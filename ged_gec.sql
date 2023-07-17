-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 juil. 2023 à 00:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ged_gec`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCat` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomCat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCat`),
  KEY `categories_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCat`, `nomCat`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Importants', 2, '2023-06-26 10:35:29', '2023-06-26 10:35:29'),
(2, 'Favoris', 2, '2023-06-23 00:00:00', '2023-06-23 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `category_mails`
--

DROP TABLE IF EXISTS `category_mails`;
CREATE TABLE IF NOT EXISTS `category_mails` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint UNSIGNED NOT NULL,
  `mail_id` bigint UNSIGNED NOT NULL,
  `dateAjout` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_mails_category_id_foreign` (`category_id`),
  KEY `category_mails_mail_id_foreign` (`mail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_mails`
--

INSERT INTO `category_mails` (`id`, `category_id`, `mail_id`, `dateAjout`, `created_at`, `updated_at`) VALUES
(114, 2, 7, '2023-07-07', NULL, NULL),
(122, 2, 12, '2023-07-11', NULL, NULL),
(121, 3, 10, '2023-07-08', NULL, NULL),
(119, 2, 10, '2023-07-08', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `idDep` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomDep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idDep`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departments`
--

INSERT INTO `departments` (`idDep`, `nomDep`, `created_at`, `updated_at`) VALUES
(4, 'Scientifique', '2023-06-22 23:24:07', '2023-06-22 23:24:07'),
(5, 'Informatique', '2023-07-02 22:02:23', '2023-07-02 22:02:23');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `idDoc` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomDoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatDoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateVersion` date NOT NULL,
  `numeroVersion` int NOT NULL,
  `taille` int NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`idDoc`),
  KEY `documents_service_id_foreign` (`service_id`),
  KEY `documents_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mails`
--

DROP TABLE IF EXISTS `mails`;
CREATE TABLE IF NOT EXISTS `mails` (
  `idMail` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomMail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatMail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heureDepot` time NOT NULL,
  `dateDepot` date NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMail`),
  KEY `mails_service_id_foreign` (`service_id`),
  KEY `mails_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_21_141820_create_departments_table', 1),
(6, '2023_06_21_141849_create_services_table', 1),
(7, '2023_06_21_141921_create_documents_table', 1),
(8, '2023_06_21_142013_create_mails_table', 1),
(9, '2023_06_21_142507_create_categories_table', 1),
(10, '2023_06_21_142910_create_category_mails_table', 1),
(11, '2023_06_23_124758_add_type_to_documents_table', 2),
(12, '2023_06_27_124242_add_user_id_to_category_mails', 3),
(13, '2023_06_29_101540_add_description_to_documents', 4),
(14, '2023_06_29_221609_add_description_to_users', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `idSer` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomSer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSer`),
  KEY `services_department_id_foreign` (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`idSer`, `nomSer`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Service analyse', 4, NULL, NULL),
(4, 'Service de modélisation', 5, '2023-07-06 12:42:52', '2023-07-06 12:42:52'),
(5, 'Service comptabilité', 4, '2023-07-11 15:04:02', '2023-07-11 15:04:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepasse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  `villeNaissance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cree_a` datetime NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `motdepasse`, `dateNaissance`, `statut`, `villeNaissance`, `cree_a`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Flo', 'hk', 's4@gmail.com', '$2y$10$5HkY6s/OrdaMbijZZ7RdQuw5gl6TFLdfzqVG3ikL6KZRQ.nhUF5B6', '2023-06-21', 0, 'sasasa', '2023-07-07 14:52:35', 1, '2023-06-22 23:29:25', '2023-07-07 13:52:35'),
(2, 'Dupont', 'Marc', 's1@gmail.com', '$2y$10$KCUC3rmO.jYO0gOYTbpaAeSZR3K9CBDFRZqgqEAN5g98ZWZPUpVai', '2023-06-21', 1, 'Akpakpa', '2023-07-11 13:14:25', 4, '2023-06-22 23:29:58', '2023-07-11 12:14:25'),
(3, 'Cossi', 'Jean', 'b@gmail.com', '$2y$10$88AoOATGINFnHagUmvRpg.K2G7Ul5rbXm1zCfB256pGEcXvEI6dMm', '2023-07-08', 0, 'Cotonou', '2023-07-11 13:05:48', 4, '2023-07-08 21:49:53', '2023-07-11 12:05:48'),
(4, 'Cocouvi', 'Richard', 'cocou@gmail.com', '$2y$10$DXdzTWTKOY1QVDwiupazR.1gFVFUeubb2U7Ux.pcvGxWNQSyRzj2C', '2023-06-26', 0, 'Cotonou', '2023-07-11 17:02:27', 4, '2023-07-11 15:02:27', '2023-07-11 15:02:27'),
(5, 'Cossi', 'Richard', 'co@gmail.com', '$2y$10$FAgacRkjJcGyqoZFdnlf6ONcTZqoDhYwMuH7pDVXEQanfx23BZYfW', '2023-07-19', 0, 'Cotonou', '2023-07-11 17:13:12', 4, '2023-07-11 15:13:12', '2023-07-11 15:13:12'),
(6, 'Flo', 'Jean', 'flo@gmail.com', '$2y$10$dqbQikBoLvwW3noZ4A2YIug8WZBl/MGIU4W/bxEp9jE97ohhqFVwu', '2023-07-20', 0, 'Cotonou', '2023-07-11 17:17:00', 5, '2023-07-11 15:17:00', '2023-07-11 15:17:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
