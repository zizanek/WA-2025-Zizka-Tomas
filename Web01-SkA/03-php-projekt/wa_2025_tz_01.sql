-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 20. bře 2025, 12:13
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wa_2025_tz_01`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `subcategory`, `year`, `price`, `isbn`, `description`, `link`, `images`, `created_at`, `updated_at`) VALUES
(1, 'aaa', 'bbb', '', NULL, 2002, 20.00, '1111', '', '', '[]', '2025-03-20 10:54:58', '2025-03-20 10:54:58'),
(2, 'ccc', 'ccc', '', NULL, 2005, 80.00, '147', '', '', '[]', '2025-03-20 10:55:43', '2025-03-20 10:55:43'),
(3, 'aaaa', 'aaa', '', NULL, 2000, 200.00, '2000', '', '', '[]', '2025-03-20 11:01:13', '2025-03-20 11:01:13'),
(4, 'dsdsa', 'sadsadas', '', NULL, 2000, 5555.00, '555', '', '', '[]', '2025-03-20 11:01:29', '2025-03-20 11:01:29'),
(5, 'fgfdgd', 'fdgdfgdf', '', NULL, 20005, 5.00, '555454', '', '', '[]', '2025-03-20 11:01:48', '2025-03-20 11:01:48'),
(7, 'ůhhgfh', 'gfhfghgfh', '', NULL, 200, 200.00, '20000', '', '', '[]', '2025-03-20 11:04:59', '2025-03-20 11:04:59');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
