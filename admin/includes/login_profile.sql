-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 23. 04 2018 kl. 12:59:56
-- Serverversion: 5.6.24
-- PHP-version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_profile`
--
CREATE DATABASE IF NOT EXISTS `login_profile` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login_profile`;


-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `anime`
--

CREATE TABLE `anime` (
  `id_anime` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc_anime` text NOT NULL,
  `date_anime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_a` varchar(200) NOT NULL,
  `fk_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categori_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `categories`
--

INSERT INTO `categories` (`id`, `categori_name`) VALUES
(1, 'Movies'),
(2, 'Series'),
(3, 'Anime');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `genre`
--

INSERT INTO `genre` (`id_genre`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Thriller'),
(5, 'Comedy'),
(6, 'Martial Arts'),
(7, 'Anime'),
(8, 'Adventure'),
(9, 'Drama'),
(10, 'Fantasy'),
(11, 'Crime'),
(12, 'Historical'),
(13, 'Horror'),
(14, 'Supernatural'),
(15, 'Mystery'),
(16, 'Romance'),
(17, 'Science Fiction'),
(18, 'Slice of life');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `movies`
--

CREATE TABLE `movies` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc_movies` text NOT NULL,
  `date_movie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_m` varchar(200) NOT NULL,
  `fk_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `permissions`
--

CREATE TABLE `permissions` (
  `permissions_id` int(11) NOT NULL,
  `permissions_name` varchar(50) NOT NULL,
  `permissions_cname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `permissions`
--

INSERT INTO `permissions` (`permissions_id`, `permissions_name`, `permissions_cname`) VALUES
(1, 'Administration: Opret brugere', 'admin_opret_brugere'),
(2, 'Administration: Rediger brugere', 'admin_rediger_brugere'),
(3, 'Administration: Slet brugere', 'admin_slet_brugere'),
(4, 'Administration: Deaktiver brugere', 'admin_deaktiver_brugere'),
(5, 'Administration: Skift medlemmers brugernavn', 'admin_skift_medlemmers_username'),
(6, 'Administration: Skift moderatorers brugernavn', 'admin_skift_moderators_username'),
(7, 'Administration: Rediger spil', 'admin_rediger_spil'),
(8, 'Administration: Slet spil', 'admin_slet_spil'),
(9, 'Administration: Deaktiver spil', 'admin_deaktiver_spil'),
(10, 'Administration: Deaktiver specifikke downloads', 'admin_deaktiver_specifikke_downloads'),
(11, 'Administration: Rediger medlemmers kommentarer', 'admin_rediger_medlemmers_kommentarer'),
(12, 'Administration: Slet medlemmers kommentarer', 'admin_slet_medlemmers_kommentarer'),
(13, 'Administration: Rediger moderatorers kommentarer', 'admin_rediger_moderatorers_kommentarer'),
(14, 'Administration: Slet moderatorers kommentarer', 'admin_slet_moderatorers_kommentarer'),
(15, 'Registrer profil', 'registrer_profil'),
(16, 'Upload spil', 'upload_spil'),
(17, 'Rediger egne spil', 'rediger_egne_spil'),
(18, 'Slet egne spil', 'slet_egne_spil'),
(19, 'Rate spil', 'rate_spil'),
(20, 'Download spil', 'download_spil'),
(21, 'Læs kommentarer', 'laes_kommentarer'),
(22, 'Skriv kommentarer', 'skriv_kommentarer'),
(23, 'Tilmeld og frameld nyhedsbrev', 'tilmeld_og_frameld_nyhedsbrev'),
(24, 'Spil online', 'spil_online');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `order` int(2) NOT NULL DEFAULT '1',
  `role_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `roles`
--

INSERT INTO `roles` (`role_id`, `order`, `role_name`) VALUES
(1, 9, 'ADMIN'),
(2, 8, 'MODERATOR'),
(3, 1, 'MEMBER'),
(4, 0, 'GUEST');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `roles_and_permissions`
--

CREATE TABLE `roles_and_permissions` (
  `insertId` int(10) UNSIGNED NOT NULL COMMENT 'This is for the Specific Role',
  `uid` int(11) NOT NULL COMMENT 'Linking to the User''s account',
  `permission_id` int(11) NOT NULL COMMENT 'Linking to the Role and it''s permissions'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `roles_and_permissions`
--

INSERT INTO `roles_and_permissions` (`insertId`, `uid`, `permission_id`) VALUES
(1, 34, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `series`
--

CREATE TABLE `series` (
  `id_series` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc_series` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_s` varchar(200) NOT NULL,
  `fk_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `uid` int(11) UNSIGNED NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `upass` varchar(200) DEFAULT NULL,
  `uemail` varchar(70) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` varchar(6) NOT NULL DEFAULT '000000',
  `city` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `uemail`, `fname`, `lname`, `address`, `zipcode`, `city`, `phone`) VALUES
(34, 'spar', 'f412a2010eb6625c85ebe505e051e18008501c5e', 'master@thehouse.co.uk', 'Spar', 'Admin', '123 FakeIt Road Ave', '000000', 'WWW', '8885554455'),
(35, 'hej', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'hej@live.dk', 'hej', 'hej', '', '123456', '', '0'),
(36, 'test', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'test@live.dk', 'test', 'test', '', '123456', '', '0'),
(37, 'noob', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'noob@two.o', 'Noob', 'Noob', '', '123456', '', '0');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id_anime`),
  ADD KEY `fk_categories_id` (`fk_categories_id`);

--
-- Indeks for tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks for tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movie`),
  ADD KEY `fk_categories_id` (`fk_categories_id`);

--
-- Indeks for tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissions_id`);

--
-- Indeks for tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks for tabel `roles_and_permissions`
--
ALTER TABLE `roles_and_permissions`
  ADD PRIMARY KEY (`insertId`);

--
-- Indeks for tabel `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_series`),
  ADD KEY `fk_categories_id` (`fk_categories_id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `anime`
--
ALTER TABLE `anime`
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tilføj AUTO_INCREMENT i tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tilføj AUTO_INCREMENT i tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tilføj AUTO_INCREMENT i tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `roles_and_permissions`
--
ALTER TABLE `roles_and_permissions`
  MODIFY `insertId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'This is for the Specific Role', AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `series`
--
ALTER TABLE `series`
  MODIFY `id_series` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
